<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
	protected $primaryKey = 'id';
	protected $fillable = ['nombre', 'apellido','dni','tel','area_id'];

	public $timestamps = true;
}
