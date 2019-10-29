<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de asistencias</title>
     <link href="{{asset('css/entypo.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/mouldifi-core.css')}}" rel="stylesheet">
	<link href="{{asset('css/mouldifi-forms.css')}}" rel="stylesheet">
	<link href="{{asset('css/plugins/datepicker/bootstrap-datepicker.css')}}" rel="stylesheet">
	
	<link href="{{asset('css/plugins/scrollbar/perfect-scrollbar.css')}}" rel="stylesheet">
</head>
<body>

<div class="page-container sidebar-collapsed">

<!-- Page Sidebar -->
	<div class="page-sidebar" >
	
		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo"><a href="{{route('index')}}"><img src="{{asset('images/logo-suite-05.png') }}" alt="Suits ltd" title="Suits Gestión de asistencias" style="max-height:50px"></a></div>
		  <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
		  <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
		</header>
		<!-- /site header -->
		
		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse ">
			
			<li><a  href="{{route('index')}}"><i class="fa fa-dashboard"></i><span class="title">Resumen</span></a></li>
			<li><a class="ajax" href="{{route('employees')}}"><i class="fa fa-users"></i><span class="title">Empleados</span></a></li>
			
			<li><a class="ajax" href="{{route('places')}}"><i class="fa fa-map-marker"></i><span class="title">Puntos de chequeo</span></a></li>
			<li><a class="ajax" href="#"><i class="fa fa-line-chart"></i><span class="title">Reportes</span></a></li>
			
			
			
			
			
		</ul>
		<!-- /main navigation -->		
  </div>
  <!-- /page sidebar -->
  
  
  <div class="main-container gray-bg">
  
  <div class="main-header row">
		  <div class="col-sm-6 col-xs-7">
		  
			<!-- User info -->
			<ul class="user-info pull-left">          
			  <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="{{asset('images/man-3.jpg')}}">{{ Auth::user()->email}} <span class="caret"></span></a>
			  
				<!-- User action menu -->
				<ul class="dropdown-menu">
				 
				  <li><a class="ajax" href="{{route('logout')}}"><i class="icon-user"></i>Mi cuenta</a></li>
				  <li><a class="ajax" href="{{route('logout')}}"><i class="fa fa-bug"></i>Reportar error</a></li>
				  <div class="divider"></div>
				  <li><a class="ajax" href="{{route('logout')}}"><i class="icon-logout"></i>Salir</a></li>
				</ul>
				<!-- /user action menu -->
				
			  </li>
			</ul>
			<!-- /user info -->
			
		  </div>
		  
	
		</div>
		
		<div class="main-content">
			<div id="principal" >
				@yield('principal')
			</div>
			<footer class="animatedParent animateOnce z-index-10"> 
				<div class="footer-main animated fadeInUp slow">&copy; 2018 <strong>Joseevillasmil@hotmail.es</strong> </div>
			</footer>	
			<!-- /footer -->
		
	  </div>
	</div>
</div>
  
     <!-- /page container -->

     <div class="menu-backdrop fade"></div>
     <!--Load JQuery-->
     <script src="{{asset('js/jquery.min.js?2')}}"></script>
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
     <script src="{{asset('js/plugins/metismenu/jquery.metisMenu.js')}}"></script>
     <script src="{{asset('js/plugins/blockui-master/jquery-ui.js')}}"></script>
     <script src="{{asset('js/plugins/blockui-master/jquery.blockUI.js')}}"></script>
     <script src="{{asset('js/plugins/css3-animate-it-plugin/css3-animate-it.js')}}"></script>
     <script src="{{asset('js/respond.min.js')}}"></script>
	 <script src="{{asset('js/html5shiv.min.js')}}"></script>
     <!--Float Charts-->
     <script src="{{asset('js/plugins/flot/jquery.flot.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.resize.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.selection.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.pie.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.time.min.js')}}"></script>
    
     <script src="{{asset('js/plugins/scrollbar/perfect-scrollbar.jquery.min.js')}}"></script>
     <script src="{{asset('js/functions.js?2')}}"></script>
     <!--ChartJs-->
     <script src="{{asset('js/plugins/chartjs/Chart.min.js')}}"></script>	
	 <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	 <script src="{{asset('js/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	 <script src="{{asset('js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
	 <script src="{{asset('js/plugins/datatables/jszip.min.js')}}"></script>
	 <script src="{{asset('js/plugins/datatables/pdfmake.min.js')}}"></script>
	 
	<script src="{{asset('js/plugins/morris/raphael-min.js')}}"></script>
    <script src="{{asset('js/plugins/morris/morris.min.js')}}"></script>
	<script src="{{asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtFqKYKuSip61ll0w8-3a6yBE4wZi0ko8"></script>
	 @include('js/general')
 
</body>
</html>
