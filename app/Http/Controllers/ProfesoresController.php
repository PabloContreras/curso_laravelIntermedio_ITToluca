<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;

class ProfesoresController extends Controller
{
    public function index(){
    	$profesores = Profesor::all();
    	return view('profesores.index', compact('profesores'));
    }
    public function store(Request $request){
    	$this->validate($request, [
			'nombre_profesor' => 'required',
			'carrera' => 'required',
			'edad_profesor' => 'required',
		]);
    	$profesor = new Profesor; 
    	$profesor->nombre = $request->nombre_profesor;
    	$profesor->carrera = $request->carrera;
    	$profesor->edad = $request->edad_profesor;
    	$profesor->status = 1;
    	$profesor->save();
    	return redirect('/profesores');
    }
    public function destroy($id){
    	$Profesor = Profesor::find($id);
    	$Profesor->delete();
    	return back();
    }
    public function update($id, Request $request){
    	$this->validate($request, [
			'nombre_profesor' => 'required',
			'carrera' => 'required',
			'edad_profesor' => 'required',
		]);
    	$profesor = Profesor::find($id); 
    	$profesor->nombre = $request->nombre_profesor;
    	$profesor->carrera = $request->carrera;
    	$profesor->edad = $request->edad_profesor;
    	$profesor->save();
    	return back();
    }
    public function changeStatus($id){
    	$profesor = Profesor::find($id);
    	if ( $profesor->status == 1 ) {
    		$profesor->status = 0;
    	} else {
    		$profesor->status = 1;
    	}
    	$profesor->save();
    	return back();
    }
}
