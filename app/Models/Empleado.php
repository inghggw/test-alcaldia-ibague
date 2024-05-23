<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	protected $table = 'empleado';
	protected $fillable = [
		'nombre',
		'apellido',
		'tipo_documento_id',
		'numero_documento',
		'departamento_id',
		'celular',
		'telefono',
		'direccion',
		'barrio',
	];

	/**
	 * Relacion con el tipo de documento.
	 */
	public function tipoDocumento()
	{
		return $this->belongsTo(TipoDocumento::class);
	}

	/**
	 * Relacion el departameno.
	 */
	public function departamento()
	{
		return $this->belongsTo(Departamento::class);
	}
}
