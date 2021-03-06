@extends('layout')
@section('content')
	<div class="row justify-content-center">
		<div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Materias</h4>
                <p class="card-category">Esta es la lista de materias creadas al momento</p>
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
	                        	Descripción
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
                      		@forelse( $materias as $materia )
		                        <tr>
		                        	<td>
		                        		{{ $materia->id }}
		                        	</td>
		                        	<td>
		                        		{{ $materia->nombre }}
		                        	</td>
		                        	<td>
		                        		{{ $materia->descripcion }}
		                        	</td>
		                        	<td>
		                        		<a href="{{ url('/materias/'.$materia->id.'/cambiar-estado') }}" class="btn btn-info py-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cambiar status" aria-describedby="tooltip748507" rel="tooltip">
		                        			{{ $materia->status === 1 ? 'Activo' : 'Inactivo'}}
		                        		</a>
		                        	</td>
		                        	<td>
		                        		{{ $materia->created_at->format('d-M-Y') }}
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-info px-1 py-1" data-toggle="modal" data-target="#showModal{{ $materia->id }}">
		                        			<i class="material-icons">visibility</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-success px-1 py-1" data-toggle="modal" data-target="#editModal{{ $materia->id }}">
		                        			<i class="material-icons">create</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<form method="POST" action="{{ url('/materias/'.$materia->id.'/eliminar') }}">
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
	                        		<th colspan="8"> Por el momento no tienes materias registradas </th>
	                        	</tr>
	                        @endforelse
                      	</tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            	<a href="{{ url('/materias/crear') }}" class="btn btn-success ml-auto" data-toggle="modal" data-target="#createModal">Registrar nueva materia</a>
            </div>
        </div>
	</div>
	{{-- 		Modal para Creación			--}}
	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form action="{{ url('/materias/crear') }}" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Registrar materia</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
			      	<div class="modal-body">
			      		<div class="row justify-content-center">
				        	<div class="col-sm-12 col-md-10 col-lg-6">
			            		<div class="row mt-5">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<label class="mdc-label-floating" style="float: left !important;">Nombre de la materia</label>
				                        	<input type="text" class="form-control" name="nombre_materia" style="color: black;" required="">
				                        </div>
				                    </div>
			            		</div>
			            		<div class="row mt-5">
			                		<div class="col-md-12">
				                        <div class="form-group">
		                          			<div class="form-group">
		                            			<label class="mdc-label-floating">Descripción</label>
		                            			<textarea class="form-control" name="descripcion_materia" rows="5" style="color: black;" required=""></textarea>
		                          			</div>
		                        		</div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/materias') }}" class="btn btn-danger ml-auto">Cancelar</a>
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
	@forelse( $materias as $materia )
		<div class="modal fade" id="showModal{{ $materia->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detalles de la materia</h5>
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
				                        	<h4><b>Nombre de la materia: </b>{{ $materia->nombre }}</h4>
				                        </div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Descripción: </b> {{ $materia->descripcion }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			            		<div class="row">
			                		<div class="col-md-12">
				                        <div class="form-group">
				                        	<h5 style="text-transform: capitalize;">
				                        		<b>Estado: </b> {{ $materia->status === 1 ? 'Activo' : 'Inactivo' }}
				                        	</h5>
		                        		</div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/materias') }}" class="btn btn-danger ml-auto">Cerrar</a>
			      	</div>
		    	</div>
		  	</div>
		</div>
	@empty
	@endforelse
	{{-- Fin de modal de visualización --}}
	{{-- 		Modal para edición		--}}
	@forelse( $materias as $materia )
		<div class="modal fade" id="editModal{{ $materia->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form action="{{ url('/materias/'.$materia->id.'/editar') }}" method="POST">
						@method('PUT')
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar materia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				      		<div class="row justify-content-center">
					        	<div class="col-sm-12 col-md-10 col-lg-6">
				            		<div class="row mt-5">
				                		<div class="col-md-12">
					                        <div class="form-group">
					                        	<label class="mdc-label-floating" style="float: left !important;">Nombre de la materia</label>
					                        	<input type="text" class="form-control" name="nombre_materia" style="color: black;" value="{{ $materia->nombre }}" required="">
					                        </div>
					                    </div>
				            		</div>
				            		<div class="row mt-5">
				                		<div class="col-md-12">
					                        <div class="form-group">
			                          			<div class="form-group">
			                            			<label class="mdc-label-floating">Descripción</label>
			                            			<textarea class="form-control" name="descripcion_materia" rows="5" style="color: black;" required="">{{ isset($materia->descripcion) ? ucfirst($materia->descripcion) : '' }}</textarea>
			                          			</div>
			                        		</div>
					                    </div>
				            		</div>
				                </div>
				      		</div>
				      	</div>
				      	<div class="modal-footer">
				        	<a href="{{ url('/materias') }}" class="btn btn-danger ml-auto">Cancelar</a>
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