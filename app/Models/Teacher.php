<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'ac_docente';
    protected $primaryKey = 'doc_id';
    protected $fillable = ['doc_per_id', 'doc_grado_academico', 'doc_pago', 'doc_observaciones', 'doc_estado', 'doc_fec_ing'];

    public function people()
    {
        return $this->belongsTo(People::class, 'doc_per_id', 'per_id');
    }

    public static function getGradeAcademic()
    {
        return [
            'sin_asignar' => 'Sin Asignar',
            'licenciatura' => 'Licenciatura',
            'doctorado' => 'Doctorado',
            'ingenieria' => 'Ingeniería',
            'maestria' => 'Maestría',
        ];
    }
}
