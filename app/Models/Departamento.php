<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
	use HasFactory;
	protected $table = 'departamento';
	protected $fillable = ['nombre', 'codigo'];

	/**
	 * Relacion con empleados
	 *
	 * @return void
	 */
	public function empleados()
	{
			return $this->hasMany(Empleado::class);
	}
}
