<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriasController extends Controller
{
    public function index(){
    	$materias = Materia::all();
    	return view('materias.index', compact('materias'));
    }
    public function store(Request $request){
    	$this->validate($request, [
			'nombre_materia' => 'required',
			'descripcion_materia' => 'required|max:255',
		]);
    	$materia = new Materia; 
    	$materia->nombre = $request->nombre_materia;
    	$materia->descripcion = $request->descripcion_materia;
    	$materia->status = 1;
    	$materia->save();
    	return redirect('/materias');
    }
    public function destroy($id){
    	$materia = Materia::find($id);
    	$materia->delete();
    	return back();
    }
    public function update($id, Request $request){
    	$this->validate($request, [
			'nombre_materia' => 'required',
			'descripcion_materia' => 'required|max:255',
		]);
    	$materia = Materia::find($id);
    	$materia->nombre = $request->nombre_materia;
    	$materia->descripcion = $request->descripcion_materia;
    	$materia->save();
    	return back();
    }
    public function changeStatus($id){
    	$materia = Materia::find($id);
    	if ( $materia->status == 1 ) {
    		$materia->status = 0;
    	} else {
    		$materia->status = 1;
    	}
    	$materia->save();
    	return back();
    }
}
