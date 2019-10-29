<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel principal</title>
     <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
     <link href="{{asset('css/entypo.css')}}" rel="stylesheet">
     <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/clevex-core.css')}}" rel="stylesheet">
     <link href="{{asset('css/clevex-forms.css')}}" rel="stylesheet">
     <link href="{{asset('css/plugins/scrollbar/perfect-scrollbar.css')}}" rel="stylesheet">
	 <link href="css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
</head>
<body>

     <!-- Page container -->
     <div class="page-container">

          <!-- Page Sidebar -->
          <div class="page-sidebar" id="menu">

               <!-- Site header  -->
               <header class="site-header">
                    <div class="user-header-box">
                         <div class="background">
                              <img src="images/nav-head-bg.png">
                         </div>
                         <div class="user-header-detail">
                              <a href="#!user"><img class="img-circle avatar hidden" src="images/man-3.jpg"></a>
                              <a href="#!email"><span class="white-text email">{{ session('email') }}</span></a>
                         </div>
                    </div>
               </header>
               <!-- /site header -->

               <!-- Main navigation -->
               <ul id="side-nav" class="main-menu">
                    <li class="has-sub active "><a href="index.html"><i class="icon-gauge"></i><span class="title">Opciones</span></a>
                         <ul class="nav">
                              <li class="hidden"><a class="ajax" href="{{-- route('companys') --}}" data-name="Accounts" ><span class="title">Inicio</span></a></li>
                              
                         </ul>
                    </li>
					<hr>
					<li><a class="menu-toggle"  ><span class="title"><i class="fa fa-chevron-left"></i>Cerrar menu</span></a></li>
                    
                    
               </ul>
               <!-- /main navigation -->
          </div>
          <!-- /page sidebar -->

          <!-- Main container -->
          <div class="main-container gray-bg">

               <!-- Main header -->
               <div class="main-header row">
                    <div class="col-sm-6 col-xs-7">

                         <!-- Site header  -->
                         <div class="header-logo">
                              <div class="menu-toggle"><a class="menu-icon" href="#menu"><i class="icon-menu"></i></a></div>
                              <div class="site-logo"><a href="{{ route('index') }}"><img src="images/logo.png" alt="Clevex" title="Clevex"></a></div>
                         </div>
                         <!-- /site header -->
                    </div>

                    <div class="col-sm-6 col-xs-5">
                         <div class="pull-right">

                              <!-- User info -->
                              <ul class="user-info">
                                   <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="{{asset('images/user.png')}}"></a>

                                        <!-- User action menu -->
                                        <ul class="dropdown-menu">

                                             <li class="hidden"><a href="#/"><i class="icon-user"></i>My profile</a></li>
                                             <li class="hidden"><a href="#/"><i class="icon-mail"></i>Messages</a></li>
                                             <li class="hidden"><a href="#"><i class="icon-clipboard"></i>Tasks</a></li>
                                             <li class="divider"></li>
                                             <li class="hidden"><a href="#"><i class="icon-cog"></i>Account settings</a></li>
                                             <li><a class="ajax" href="{{ route('logout') }}"><i class="icon-logout"></i>Salir</a></li>
                                        </ul>
                                        <!-- /user action menu -->

                                   </li>
								   
                              </ul>
                              <!-- /user info -->
                         </div>
                    </div>
               </div>
               <!-- /main header -->

               <!-- Main content -->
               <div class="main-content">
                    <h1 class="page-title">
						<a class="ajax" href="{{ route('companys') }}">Panel principal</a>
						<hr>
					</h1>
                    <div class="row" id="principal">
                        @yield('principal')
                    </div>
               
                    <footer class="footer-main">
                         &copy; 2018 <strong>Wallet app</strong> Jose Villasmil
                    </footer>
                    <!-- /footer -->

               </div>
               <!-- /main content -->

          </div>
          <!-- /main container -->

     </div>
     <!-- /page container -->

     <div class="menu-backdrop fade"></div>
     <!--Load JQuery-->
     <script src="{{asset('js/jquery.min.js')}}"></script>
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <script src="{{asset('js/plugins/metismenu/jquery.metisMenu.js')}}"></script>
     <script src="{{asset('js/plugins/blockui-master/jquery-ui.js')}}"></script>
     <script src="{{asset('js/plugins/blockui-master/jquery.blockUI.js')}}"></script>
     <!--Float Charts-->
     <script src="{{asset('js/plugins/flot/jquery.flot.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.resize.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.selection.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.pie.min.js')}}"></script>
     <script src="{{asset('js/plugins/flot/jquery.flot.time.min.js')}}"></script>
     <script src="{{asset('js/plugins/big-slide/bigslide.min.js')}}"></script>
     <script src="{{asset('js/plugins/scrollbar/perfect-scrollbar.jquery.min.js')}}"></script>
     <script src="{{asset('js/functions.js')}}"></script>

     <!--ChartJs-->
     <script src="js/plugins/chartjs/Chart.min.js')}}"></script>
	 <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
	 <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('js/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('js/plugins/datatables/jszip.min.js')}}"></script>
	<script src="{{asset('js/plugins/datatables/pdfmake.min.js')}}"></script>
	
	<script src="{{asset('js/plugins/morris/raphael-min.js')}}"></script>
    <script src="{{asset('js/plugins/morris/morris.min.js')}}"></script>
	 @include('js/general')
 
</body>
</html>
