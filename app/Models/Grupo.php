<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function materia()
	{
		return $this->belongsTo(Materia::class, 'materia_id');
	}

	public function aula()
	{
		return $this->belongsTo(Aula::class, 'aula_id');
	}

	public function profesor()
	{
		return $this->belongsTo(Profesor::class, 'profesor_id');
	}
}
