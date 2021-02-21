<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Profesor;

class GruposController extends Controller
{
	public function home(){
    	return view('welcome');
    }
    public function index(){
    	$grupos = Grupo::all();
    	$materias = Materia::where('status', 1)->get();
    	$profesores = Profesor::where('status', 1)->get();
    	$aulas = Aula::where('status', 1)->get();
    	return view('grupos.index', compact('grupos', 'materias', 'profesores', 'aulas'));
    }
    public function store(Request $request){
    	$this->validate($request, [
			'materia' => 'required',
			'profesor' => 'required',
			'aula' => 'required',
			'horario' => 'required',
			'total_alumnos' => 'required',
		]);
    	$grupo = new Grupo; 
    	$grupo->materia_id = $request->materia;
    	$grupo->profesor_id = $request->profesor;
    	$grupo->aula_id = $request->aula;
    	$grupo->horario = $request->horario;
    	$grupo->tot_alumnos = $request->total_alumnos;
    	$grupo->status = 1;
    	$grupo->save();
    	return redirect('/grupos');
    }
    public function destroy($id){
    	$grupo = Grupo::find($id);
    	$grupo->delete();
    	return back();
    }
    public function update($id, Request $request){
    	$this->validate($request, [
			'materia' => 'required',
			'profesor' => 'required',
			'aula' => 'required',
			'horario' => 'required',
			'total_alumnos' => 'required',
		]);
    	$grupo = Grupo::find($id); 
    	$grupo->materia_id = $request->materia;
    	$grupo->profesor_id = $request->profesor;
    	$grupo->aula_id = $request->aula;
    	$grupo->horario = $request->horario;
    	$grupo->tot_alumnos = $request->total_alumnos;
    	$grupo->save();
    	return back();
    }
    public function changeStatus($id){
    	$grupo = Grupo::find($id);
    	if ( $grupo->status == 1 ) {
    		$grupo->status = 0;
    	} else {
    		$grupo->status = 1;
    	}
    	$grupo->save();
    	return back();
    }
}
