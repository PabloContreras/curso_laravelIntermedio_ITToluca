@extends('layout')
@section('content')
	<div class="row justify-content-center">
		<div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Aulas</h4>
                <p class="card-category">Esta es la lista de aulas registradas al momento</p>
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
                      		@forelse( $aulas as $aula )
		                        <tr>
		                        	<td>
		                        		{{ $aula->id }}
		                        	</td>
		                        	<td>
		                        		{{ $aula->nombre }}
		                        	</td>
		                        	<td>
		                        		<a href="{{ url('/aulas/'.$aula->id.'/cambiar-estado') }}" class="btn btn-info py-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cambiar status" aria-describedby="tooltip748507" rel="tooltip">
		                        			{{ $aula->status === 1 ? 'Activo' : 'Inactivo'}}
		                        		</a>
		                        	</td>
		                        	<td>
		                        		{{ $aula->created_at->format('d-M-Y') }}
		                        	</td>
		                        	<td>
		                        		<button class="btn btn-success px-1 py-1" data-toggle="modal" data-target="#editModal{{ $aula->id }}">
		                        			<i class="material-icons">create</i>
		                        		</button>
		                        	</td>
		                        	<td>
		                        		<form method="POST" action="{{ url('/aulas/'.$aula->id.'/eliminar') }}">
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
	                        		<th colspan="8"> Por el momento no tienes aulas registradas </th>
	                        	</tr>
	                        @endforelse
                      	</tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            	<a href="{{ url('/aulas/crear') }}" class="btn btn-success ml-auto" data-toggle="modal" data-target="#createModal">Registrar nueva aula</a>
            </div>
        </div>
	</div>
	{{-- 			Modal para Creación			--}}
	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form action="{{ url('/aulas/crear') }}" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Registrar aula</h5>
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
				                        	<label class="mdc-label-floating">Nombre del aula</label>
				                        	<input type="text" class="form-control" name="nombre_aula" style="color: black;" required="">
				                        </div>
				                    </div>
			            		</div>
			                </div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			        	<a href="{{ url('/aulas') }}" class="btn btn-danger ml-auto">Cancelar</a>
		    			<button class="btn btn-success mr-auto ml-3" type="submit">
		    				Aceptar
		    			</button>
			      	</div>
				</form>
	    	</div>
	  	</div>
	</div>
	{{-- Fin de modal de creación --}}
	{{-- 		Modal para edición		--}}
	@forelse( $aulas as $aula )
		<div class="modal fade" id="editModal{{ $aula->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form action="{{ url('/aulas/'.$aula->id.'/editar') }}" method="POST">
						@method('PUT')
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar aula</h5>
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
					                        	<label class="mdc-label-floating">Nombre del aula</label>
					                        	<input type="text" class="form-control" name="nombre_aula" style="color: black;" required="" value="{{ $aula->nombre }}">
					                        </div>
					                    </div>
				            		</div>
				                </div>
				      		</div>
				      	</div>
				      	<div class="modal-footer">
				        	<a href="{{ url('/aulas') }}" class="btn btn-danger ml-auto">Cancelar</a>
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