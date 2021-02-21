<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;

class AulasController extends Controller
{
    public function index(){
    	$aulas = Aula::all();
    	return view('aulas.index', compact('aulas'));
    }
    public function store(Request $request){
    	$this->validate($request, [
			'nombre_aula' => 'required',
		]);
    	$aula = new Aula; 
    	$aula->nombre = $request->nombre_aula;
    	$aula->status = 1;
    	$aula->save();
    	return redirect('/aulas');
    }
    public function destroy($id){
    	$aula = Aula::find($id);
    	$aula->delete();
    	return back();
    }
    public function update($id, Request $request){
    	$this->validate($request, [
			'nombre_aula' => 'required',
		]);
    	$aula = new Aula; 
    	$aula->nombre = $request->nombre_aula;
    	$aula->save();
    	return back();
    }
    public function changeStatus($id){
    	$aula = Aula::find($id);
    	if ( $aula->status == 1 ) {
    		$aula->status = 0;
    	} else {
    		$aula->status = 1;
    	}
    	$aula->save();
    	return back();
    }
}
