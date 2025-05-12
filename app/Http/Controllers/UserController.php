<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\People;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::select(['id', 'user_name', 'per_id', 'status'])->orderBy('id', 'desc')->with('people')
                ->get();

            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    $user_auth = Auth::user()->id;
                    $canDelete = $user->id !== $user_auth;
                    $editUrl = route('users.edit', $user->id);
                    $deleteUrl = route('users.destroy', $user->id);

                    $buttons = '
                    <button data-href="' . $editUrl . '" class="btn btn-icon btn-round btn-primary edit_user">
                        <i class="icon-pencil"></i>
                    </button>
                    &nbsp;';

                    if ($canDelete) {
                        $buttons .= '
                    <button data-href="' . $deleteUrl . '" class="btn btn-icon btn-round btn-danger delete_user">
                        <i class="icon-trash"></i>
                    </button>';
                    }

                    return $buttons;
                })
                ->editColumn('per_id', function ($row) {
                    if ($row->people) {
                        return $row->people->per_nombres . ' ' . $row->people->per_apellidopat . ' ' . $row->people->per_apellidomat;
                    }
                    return '';
                })

                ->editColumn('status', function ($row) {
                    return $row->status == 1 ? 'Sí' : 'No';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $status = $request->has('status') ? 1 : 0;
            $input = $request->only(['per_id', 'user_name', 'password']);
            $input['status'] = $status;
            $user  = User::create($input);

            $output = [
                'success' => true,
                'data'    => $user,
                'msg'     => __('messages.add_success'),
            ];
        } catch (\Exception $e) {
            Log::emergency(__('messages.error_log'), [
                'Archivo' => $e->getFile(),
                'Línea'   => $e->getLine(),
                'Mensaje' => $e->getMessage(),
            ]);
            $output = [
                'success' => false,
                'msg'     => __('messages.something_went_wrong'),
            ];
        }

        // Devuelve siempre JSON con cabecera correcta
        return response()->json($output);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $user = User::find($id);
            return view('usuarios/edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // if (! auth()->user()->can('user.update')) {
        //     abort(403, 'Unauthorized action.');
        // }

        if (request()->ajax()) {
            try {
                $input = $request->only(['user_name', 'per_id', 'password']);

                $user = User::findOrFail($id);
                $user->user_name = $input['user_name'];
                $user->per_id = $input['per_id'];
                if (!empty($input['password'])) {
                    $user->password = bcrypt($input['password']);
                }
                $user->status = $request->has('status') ? 1 : 0;
                $user->save();

                $output = [
                    'success' => true,
                    'msg' => __('messages.updated_success'),
                ];
            } catch (\Exception $e) {
                Log::emergency(__('messages.error_log'), [
                    'Archivo' => $e->getFile(),
                    'Línea'   => $e->getLine(),
                    'Mensaje' => $e->getMessage(),
                ]);

                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong'),
                ];
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (request()->ajax()) {
            try {
                $user = User::findOrFail($id);
                $user->delete();

                $output = [
                    'success' => true,
                    'msg' => __('messages.deleted_success'),
                ];
            } catch (\Exception $e) {
                Log::emergency(__('messages.error_log'), [
                    'Archivo' => $e->getFile(),
                    'Línea'   => $e->getLine(),
                    'Mensaje' => $e->getMessage(),
                ]);

                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong'),
                ];
            }

            return $output;
        }
    }

    public function getUserData(Request $request)
    {
        $term = $request->input('term');
        $page = $request->input('page', 1);

        $users = User::where('status', 1)->leftJoin('gr_persona', 'users.per_id', '=', 'gr_persona.per_id')
            ->where(function ($query) use ($term) {
                $query->where('users.user_name', 'like', '%' . $term . '%')
                    ->orWhere('gr_persona.per_nombres', 'like', '%' . $term . '%')
                    ->orWhere('gr_persona.per_apellidopat', 'like', '%' . $term . '%')
                    ->orWhere('gr_persona.per_apellidomat', 'like', '%' . $term . '%');
            })
            ->select(
                'users.*',
                'gr_persona.per_nombres as persona_nombre',
                'gr_persona.per_apellidopat as persona_apellidopat',
                'gr_persona.per_apellidomat as persona_apellidomat'
            );

        return $users->paginate(5, ['*'], 'page', $page);
    }
}
