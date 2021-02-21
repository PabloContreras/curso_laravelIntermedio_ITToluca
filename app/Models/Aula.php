<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $guarded = [];

	public function grupos()
	{
		return $this->hasMany(Grupo::class, 'aula_id');
	}
}
