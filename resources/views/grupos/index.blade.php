@extends('layout')
@section('content')
	<div class="row justify-content-center">
		<div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Grupos</h4>
                <p class="card-category">Esta es la lista de grupos registrados al momento</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      	<thead class=" text-primary">
	                        <th>
	                        	ID
	                        </th>
	                        <th>
	                        	Horario
	                        </th>
	                        <th>
	                        	Status
	                        </th>
	                        <th>
	                        	Creación
	                        </th>
	                        <th></th>
	                        <th></th>
	                        <th></th>
                      	</thead>
                      	<tbody>
                      		@forelse( $grupos as $grupo )
		                        <tr>
		                        	<td>
		                        		{{ $grupo->id }}
		                        	</td>
		                        	<td>
		                        		{{ $grupo->horario }}
		                        	</td>
		                        	<td>
		                        		<a href="{{ url('/grupos/'.$grupo->id.'/cambiar-estado') }}" class="btn btn-info py-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cambiar status" aria-describedby="tooltip748507" rel="tooltip">
		                        			{{ $grupo->status === 1 ? 'Activo' : 'Inactivo'}}
		                        		</a>
		                        	</td>
		                        	<td>
		                        		{{ $grupo->created_at->format('d-M-Y') }}
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-info px-1 py-1" data-toggle="modal" data-target="#showModal{{ $grupo->id }}">
		                        			<i class="material-icons">visibility</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-success px-1 py-1" data-toggle="modal" data-target="#editModal{{ $grupo->id }}">
		                        			<i class="material-icons">create</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<form method="POST" action="{{ url('/grupos/'.$grupo->id.'/eliminar') }}">
		                        			@csrf 
		                        			@method('DELETE')
		                        			<button class="btn btn-danger px-2 py-1">
		                        				<i class="material-icons">backspace</i>
		                        			</button>
		                        		</form>
		                        	</td>
		                        </tr>
	                        @empty
	                        	<tr>
	                        		<th colspan="8"> Por el momento no tienes grupos registradas </th>
	                        	</tr>
	                        @endforelse
                      	</tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            	<a href="{{ url('/grupos/crear') }}" class="btn btn-success ml-auto" data-toggle="modal" data-target="#createModal">Registrar nuevo grupo</a>
            </div>
        </div>
	</div>
	{{-- 			Modal para Creación			--}}
	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form action="{{ url('/grupos/crear') }}" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Registrar grupo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
			      	<div class="modal-body">
			      		<div class="row justify-content-center">
				        	<div class="col-sm-12 col-md-10 col-lg-8 text-black">
			            		<div class="row mt-2">
			                		<div class="col-md-12">
				                        <div class="form-group">
									    	<label for="materia">Materia</label>
									      	<select class="form-control" id="materia" name="materia" required="">
										        <option selected="" disabled=""></option>
										        @foreach( $materias as $materia )
										        	<option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
										        @endforeach
									      	</select>
									    </div>
				                    </div>
			            		</div>
			            		<div class="row mt-2">
			                		<div class="col-md-12">
				                        <div class="form-group">
									    	<label for="profesor">Profesor</label>
									      	<select class="form-control" id="profesor" name="profesor" required="">
										        <option selected="" disabled=""></option>
										        @foreach( $profesores as $profesor )
										        	<option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
										        @endforeach
									      	</select>
									    </div>
				                    </div>
			            		</div>
			            		<div class="row mt-2">
			                		<div class="col-md-12">
				                        <div class="form-group">
									    	<label for="aula">Aula</label>
									      	<select class="form-control" id="aula" name="aula" required="">
										        <option selected="" disabled=""></option>
										        @foreach( $aulas as $aula )
										        	<option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
										        @endforeach
									      	</select>
									    </div>
				                    </div>
			            		</div>
			            		<div class="row mt-2">
			                		<div class="col-md-6">
				                        <div class="form-group">
									    	<label class="mdc-label-floating">Horario</label>
				                        	<input type="time" class="form-control" name="horario" style="color: black;" required="">
									    </div>
				                    </div>
			                		<div class="col-md-6">
				                        <div class="form-group">
									    	<label class="mdc-label-floating">Total de alumnos</label>
				                        	<input type="number" class="form-control" name="total_alumnos" style="color: black;" required="" min="1">
									    </div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/grupos') }}" class="btn btn-danger ml-auto">Cancelar</a>
		    			<button class="btn btn-success mr-auto ml-3" type="submit">
		    				Aceptar
		    			</button>
			      	</div>
				</form>
	    	</div>
	  	</div>
	</div>
	{{-- Fin de modal de creación --}}
	{{-- 		Modal para visualización			--}}
	@forelse( $grupos as $grupo )
		<div class="modal fade" id="showModal{{ $grupo->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detalles del grupo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
			      	<div class="modal-body">
			      		<div class="row justify-content-center">
				        	<div class="col-sm-12 col-md-10 col-lg-8">
			            		<div class="row mt-5">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h4><b>Nombre de la materia: </b>{{ $grupo->materia->first()->nombre }}</h4>
				                        </div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Nombre del profesor: </b> {{ $grupo->profesor->first()->nombre }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Aula: </b> {{ $grupo->aula->first()->nombre }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Horario: </b> {{ $grupo->horario }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Total de alumnos: </b> {{ $grupo->tot_alumnos }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Estado: </b> {{ $grupo->status === 1 ? 'Activo' : 'Inactivo' }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/grupos') }}" class="btn btn-danger ml-auto">Cerrar</a>
			      	</div>
		    	</div>
		  	</div>
		</div>
	@empty
	@endforelse
	{{-- Fin de modal de visualización --}}
	{{-- 		Modal para edición		--}}
	@forelse( $grupos as $grupo )
		<div class="modal fade" id="editModal{{ $grupo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form action="{{ url('/grupos/'.$grupo->id.'/editar') }}" method="POST">
						@method('PUT')
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar grupo</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				      		<div class="row justify-content-center">
					        	<div class="col-sm-12 col-md-10 col-lg-8 text-black">
				            		<div class="row mt-2">
				                		<div class="col-md-12">
					                        <div class="form-group">
										    	<label for="materia">Materia</label>
										      	<select class="form-control" id="materia" name="materia" required="">
											        <option disabled=""></option>
											        @foreach( $materias as $materia )
											        	<option value="{{ $materia->id }}" {{ $grupo->materia->first()->id === $materia->id ? 'selected' : ''}}>{{ $materia->nombre }}</option>
											        @endforeach
										      	</select>
										    </div>
					                    </div>
				            		</div>
				            		<div class="row mt-2">
				                		<div class="col-md-12">
					                        <div class="form-group">
										    	<label for="profesor">Profesor</label>
										      	<select class="form-control" id="profesor" name="profesor" required="">
											        <option disabled=""></option>
											        @foreach( $profesores as $profesor )
											        	<option value="{{ $profesor->id }}" {{ $grupo->profesor->first()->id === $profesor->id ? 'selected' : ''}}>{{ $profesor->nombre }}</option>
											        @endforeach
										      	</select>
										    </div>
					                    </div>
				            		</div>
				            		<div class="row mt-2">
				                		<div class="col-md-12">
					                        <div class="form-group">
										    	<label for="aula">Aula</label>
										      	<select class="form-control" id="aula" name="aula" required="">
											        <option disabled=""></option>
											        @foreach( $aulas as $aula )
											        	<option value="{{ $aula->id }}" {{ $grupo->aula->first()->id === $aula->id ? 'selected' : ''}}>{{ $aula->nombre }}</option>
											        @endforeach
										      	</select>
										    </div>
					                    </div>
				            		</div>
				            		<div class="row mt-2">
				                		<div class="col-md-6">
					                        <div class="form-group">
										    	<label class="mdc-label-floating">Horario</label>
					                        	<input type="time" class="form-control" name="horario" style="color: black;" required="" value="{{ $grupo->horario }}">
										    </div>
					                    </div>
				                		<div class="col-md-6">
					                        <div class="form-group">
										    	<label class="mdc-label-floating">Total de alumnos</label>
					                        	<input type="number" class="form-control" name="total_alumnos" style="color: black;" required="" min="1" value="{{ $grupo->tot_alumnos }}">
										    </div>
					                    </div>
				            		</div>
				                </div>
				      		</div>
				      	</div>
				      	<div class="modal-footer">
				        	<a href="{{ url('/grupos') }}" class="btn btn-danger ml-auto">Cancelar</a>
			    			<button class="btn btn-success mr-auto ml-3" type="submit">
			    				Aceptar
			    			</button>
				      	</div>
					</form>
		    	</div>
		  	</div>
		</div>
	@empty
	@endforelse
	{{-- Fin de modal de creación --}}
@endsection