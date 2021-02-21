@extends('layout')
@section('content')
	<div class="row justify-content-center">
		<div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Profesores</h4>
                <p class="card-category">Esta es la lista de profesores registrados al momento</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      	<thead class=" text-primary">
	                        <th>
	                        	ID
	                        </th>
	                        <th>
	                        	Nombre
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
                      		@forelse( $profesores as $profesor )
		                        <tr>
		                        	<td>
		                        		{{ $profesor->id }}
		                        	</td>
		                        	<td>
		                        		{{ $profesor->nombre }}
		                        	</td>
		                        	<td>
		                        		<a href="{{ url('/profesores/'.$profesor->id.'/cambiar-estado') }}" class="btn btn-info py-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cambiar status" aria-describedby="tooltip748507" rel="tooltip">
		                        			{{ $profesor->status === 1 ? 'Activo' : 'Inactivo'}}
		                        		</a>
		                        	</td>
		                        	<td>
		                        		{{ $profesor->created_at->format('d-M-Y') }}
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-info px-1 py-1" data-toggle="modal" data-target="#showModal{{ $profesor->id }}">
		                        			<i class="material-icons">visibility</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-success px-1 py-1" data-toggle="modal" data-target="#editModal{{ $profesor->id }}">
		                        			<i class="material-icons">create</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<form method="POST" action="{{ url('/profesores/'.$profesor->id.'/eliminar') }}">
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
	                        		<th colspan="8"> Por el momento no tienes profesores registradas </th>
	                        	</tr>
	                        @endforelse
                      	</tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            	<a href="{{ url('/profesores/crear') }}" class="btn btn-success ml-auto" data-toggle="modal" data-target="#createModal">Registrar nuevo profesor</a>
            </div>
        </div>
	</div>
	{{-- 			Modal para Creación			--}}
	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form action="{{ url('/profesores/crear') }}" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Registrar profesor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
			      	<div class="modal-body">
			      		<div class="row justify-content-center">
				        	<div class="col-sm-12 col-md-10 col-lg-8 text-black">
			            		<div class="row mt-5">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<label class="mdc-label-floating">Nombre del profesor</label>
				                        	<input type="text" class="form-control" name="nombre_profesor" style="color: black;" required="">
				                        </div>
				                    </div>
			            		</div>
			            		<div class="row mt-2">
			                		<div class="col-md-12">
				                        <div class="form-group">
									    	<label for="carrera">Carrera</label>
									      	<select class="form-control" id="carrera" name="carrera" required="">
										        <option selected="" disabled=""></option>
										        <option class="black" value="Sistemas computacionales">Sistemas computacionales</option>
										        <option class="black" value="Mecatrónica">Mecatrónica</option>
										        <option class="black" value="Industrial">Industrial</option>
										        <option class="black" value="TICs">TICs</option>
									      	</select>
									    </div>
				                    </div>
			            		</div>
			            		<div class="row mt-2">
			                		<div class="col-md-12">
				                        <div class="form-group">
									    	<label class="mdc-label-floating">Edad</label>
				                        	<input type="number" class="form-control" name="edad_profesor" style="color: black;" required="" min="23">
									    </div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/profesores') }}" class="btn btn-danger ml-auto">Cancelar</a>
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
	@forelse( $profesores as $profesor )
		<div class="modal fade" id="showModal{{ $profesor->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detalles del profesor</h5>
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
				                        	<h4><b>Nombre de la materia: </b>{{ $profesor->nombre }}</h4>
				                        </div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Descripción: </b> {{ $profesor->edad }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Estado: </b> {{ $profesor->status === 1 ? 'Activo' : 'Inactivo' }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/profesores') }}" class="btn btn-danger ml-auto">Cerrar</a>
			      	</div>
		    	</div>
		  	</div>
		</div>
	@empty
	@endforelse
	{{-- Fin de modal de visualización --}}
	{{-- 		Modal para edición		--}}
	@forelse( $profesores as $profesor )
		<div class="modal fade" id="editModal{{ $profesor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form action="{{ url('/profesores/'.$profesor->id.'/editar') }}" method="POST">
						@method('PUT')
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar profesor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				      		<div class="row justify-content-center">
					        	<div class="col-sm-12 col-md-10 col-lg-8 text-black">
				            		<div class="row mt-5">
				                		<div class="col-md-12">
					                        <div class="form-group">
					                        	<label class="mdc-label-floating">Nombre del profesor</label>
					                        	<input type="text" class="form-control" name="nombre_profesor" style="color: black;" required="" value="{{ $profesor->nombre }}">
					                        </div>
					                    </div>
				            		</div>
				            		<div class="row mt-2">
				                		<div class="col-md-12">
					                        <div class="form-group">
										    	<label for="carrera">Carrera</label>
										      	<select class="form-control" id="carrera" name="carrera" required="">
											        <option disabled=""></option>
											        <option class="black" value="Sistemas computacionales" {{ $profesor->carrera == 'Sistemas computacionales' ? 'selected' : '' }}>Sistemas computacionales</option>
											        <option class="black" value="Mecatrónica" {{ $profesor->carrera == 'Mecatrónica' ? 'selected' : '' }}>Mecatrónica</option>
											        <option class="black" value="Industrial" {{ $profesor->carrera == 'Industrial' ? 'selected' : '' }}>Industrial</option>
											        <option class="black" value="TICs" {{ $profesor->carrera == 'TICs' ? 'selected' : '' }}>TICs</option>
										      	</select>
										    </div>
					                    </div>
				            		</div>
				            		<div class="row mt-2">
				                		<div class="col-md-12">
					                        <div class="form-group">
										    	<label class="mdc-label-floating">Edad</label>
					                        	<input type="number" class="form-control" name="edad_profesor" style="color: black;" required="" min="23" value="{{ $profesor->edad }}">
										    </div>
					                    </div>
				            		</div>
				                </div>
				      		</div>
				      	</div>
				      	<div class="modal-footer">
				        	<a href="{{ url('/profesores') }}" class="btn btn-danger ml-auto">Cancelar</a>
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