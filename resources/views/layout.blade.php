<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenido</title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="{{ asset('/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
    </head>
    <body class="dark-edition">
	  	<div class="wrapper ">
	    	<div class="sidebar" data-color="azure" data-background-color="black">
		      	<div class="logo">
		      		<a href="http://www.creative-tim.com" class="simple-text logo-normal">
		          		Bienvenido
		        	</a>
		        </div>
		      	<div class="sidebar-wrapper">
		        	<ul class="nav">
		          		<li class="nav-item {{ Request::path() == '/' ? 'active' : ''}}">
		            		<a class="nav-link" href="{{ url('/') }}">
		              			<i class="material-icons">dashboard</i>
		              			<p>Inicio</p>
		            		</a>
		          		</li>
		          		<li class="nav-item {{ Request::path() == 'materias' ? 'active' : ''}}">
		            		<a class="nav-link" href="{{ url('/materias') }}">
		              			<i class="material-icons">book</i>
		              			<p>Materias</p>
		            		</a>
		          		</li>
		          		<li class="nav-item {{ Request::path() == 'profesores' ? 'active' : ''}}">
		            		<a class="nav-link" href="{{ url('/profesores') }}">
		              			<i class="material-icons">face</i>
		              			<p>Profesores</p>
		            		</a>
		          		</li>
		          		<li class="nav-item {{ Request::path() == 'aulas' ? 'active' : ''}}">
		            		<a class="nav-link" href="{{ url('/aulas') }}">
		              			<i class="material-icons">location_city</i>
		              			<p>Aulas</p>
		            		</a>
		          		</li>
		          		<li class="nav-item {{ Request::path() == 'grupos' ? 'active' : ''}}">
		            		<a class="nav-link" href="{{ url('/grupos') }}">
		              			<i class="material-icons">groups</i>
		              			<p>Grupos</p>
		            		</a>
		          		</li>
		        	</ul>
		      	</div>
		    </div>
		    <div class="main-panel">
		      	<!-- Navbar -->
		      	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
		        	<div class="container-fluid">
		          		<div class="navbar-wrapper">
		            		<a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
		          		</div>
		          		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
		            		<span class="sr-only">Toggle navigation</span>
		            		<span class="navbar-toggler-icon icon-bar"></span>
		            		<span class="navbar-toggler-icon icon-bar"></span>
		            		<span class="navbar-toggler-icon icon-bar"></span>
		          		</button>
		          		<div class="collapse navbar-collapse justify-content-end">
		            		
		          		</div>
		        	</div>
		      	</nav>
		      	<!-- End Navbar -->
		      	<div class="content">
		        	<div class="container-fluid">
		        		<div class="col-sm-12 col-md-10 col-lg-8">
		          			@yield('content')
		          		</div>
		        	</div>
		      	</div>
		      	<footer class="footer">
		        	<div class="container-fluid">
		          		<div class="copyright float-right">
		            		&copy; {{ date('Y') }}, hecho con <i class="material-icons">favorite</i> 
		          		</div>
		        	</div>
		      	</footer>
		    </div>
	  	</div>
        

        <!--   Core JS Files   -->
		<script src="{{ asset('js/core/jquery.min.js') }}"></script>
		<script src="{{ asset('js/core/popper.min.js') }}"></script>
		<script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
		<script src="https://unpkg.com/default-passive-events"></script>
		<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
		<!-- Place this tag in your head or just before your close body tag. -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
		<!-- Chartist JS -->
		<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
		<!--  Notifications Plugin    -->
		<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
		<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
		<script src="{{ asset('js/material-dashboard.js?v=2.1.0') }}"></script>
    </body>
</html>
