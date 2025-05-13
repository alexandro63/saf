<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrative extends Model
{
    protected $table = "rh_administrativo";
    protected $primaryKey = "adm_id";
    protected $guarded = ['adm_id'];
}
