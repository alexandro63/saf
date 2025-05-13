<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Administrative;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $administrative = Administrative::select(['adm_id', 'plan_mat_id', 'plan_doc_id', 'plan_amb_id', 'plan_fec_ini', 'plan_fec_fin', 'plan_hor_ini'])->orderBy('plan_id', 'desc')
                ->get();

            return DataTables::of($administrative)
                ->addColumn('action', function ($row) {
                    $editUrl = route('administrative.edit', $row->plan_id);
                    $deleteUrl = route('administrative.destroy', $row->plan_id);

                    $buttons = '
                    <button data-href="' . $editUrl . '" class="btn btn-icon btn-round btn-primary edit_administrative">
                        <i class="icon-pencil"></i>
                    </button>
                    &nbsp;';

                    $buttons .= '
                    <button data-href="' . $deleteUrl . '" class="btn btn-icon btn-round btn-danger delete_administrative">
                        <i class="icon-trash"></i>
                    </button>';

                    return $buttons;
                })

                ->removeColumn('adm_id')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('planificacion_academica.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignaciones_grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
