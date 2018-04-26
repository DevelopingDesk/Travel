
<!DOCTYPE HTML>
<html>
<head>
<title>dashboards</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="school system " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('dashboard/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{asset('dashboard/css/lines.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('dashboard/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="{{asset('dashboard/css/custom.css')}}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('dashboard/js/metisMenu.min.js')}}"></script>
<script src="{{asset('dashboard/js/custom.js')}}"></script>
<!-- Graph JavaScript -->
<script src="{{asset('dashboard/js/d3.v3.js')}}"></script>
<script src="{{asset('dashboard/js/rickshaw.js')}}"></script>
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{Auth::user()->name}}</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge"></span></a>
	        		<ul class="dropdown-menu">
						
					
					
	        		</ul>
	      		</li>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{{asset('dashboard/images/1.png')}}"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						
					

                                
                                    <li  class="m_2">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                               
                            </li>

	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/home"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>


                     <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Compnay<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            	<li>
                                    <a href="{{route('ticket.entry')}}">Ticket Entry</a>
                                </li>
                                <li>
                                    <a href="{{route('create.compnay')}}">Compnay Module</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(Auth::User()->hasrole('admin'))
                         <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('daily.report')}}">Daily Records</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                       
  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
    
        </nav>
        <div id="page-wrapper" style="margin-top: -40px">
        

<div class="row">
<div class="col-md-12">
@yield('content')
    
</div>    
</div>

    
	
   
		
		</div>
 
       </div>
 

      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <link rel="stylesheet" href="{{asset('dashboard/css/clndr.css')}}" type="text/css" />
            <script src="{{asset('dashboard/js/underscore-min.js')}}" type="text/javascript"></script>
            <script src= "{{asset('dashboard/js/moment-2.2.1.js')}}" type="text/javascript"></script>
            <script src="{{asset('dashboard/js/clndr.js')}}" type="text/javascript"></script>
            <script src="{{asset('dashboard/js/site.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
     <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
</body>
</html>
