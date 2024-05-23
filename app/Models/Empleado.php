<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
	use HasFactory;
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
