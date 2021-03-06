<!doctype html>
<!-- Bootstrap Core CSS -->

<html>

	<head>
		<meta charset="UTF-8">
		<title>Admin</title>
	
	<link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
		<title>Admin</title>
	</head>

	<body>

    <div id="wrapper">
    	<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    	<!--header-->
	    	<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="#">Admin Panel Ingens</a>

			</div>
			<!-- /.navbar-header -->
	 	
			<ul class="nav navbar-top-links navbar-right">
			    <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
			        </a>
			        <ul class="dropdown-menu dropdown-user">
			         {{Form::open(array('url' => 'doLogout'))}}
			            <li><div id="logout_button" onclick="document.forms[0].submit()" style="cursor:pointer;"><i class="fa fa-sign-out fa-fw"></i> Logout</div>
			         {{ Form::close() }}    
			            </li>
			        </ul>
			        <!-- /.dropdown-user -->
			    </li>
			    <!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

	        <!-- Navigation -->
	   
	        
		        <div class="navbar-default sidebar" role="navigation">
				    <div class="sidebar-nav navbar-collapse">
				        <ul class="nav" id="side-menu">
				            
				            <li>
				                <a href="{{URL::to('/')}}/admin"><i class="fa fa-dashboard fa-fw"></i>Home</a>
				            </li>
				            <li>
				                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>User<span class="fa arrow"></span></a>
				                <ul class="nav nav-second-level">
				                    <li>
				                        <a href="{{URL::to('/')}}/changePassword">Change Password</a>
				                    </li>
				                </ul>
				            </li>  
				            <li>
				                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Categories<span class="fa arrow"></span></a>
				                <ul class="nav nav-second-level">
				                    <li>
				                        <a href="{{URL::to('/')}}/viewCategories">View</a>
				                    </li>
				                    <li>
				                        <a href="{{URL::to('/')}}/cat">Add</a>
				                    </li>
				                </ul>
				            </li>                        
				            <li>
				                <a href="#"><i class="fa fa-files-o fa-fw"></i>Items<span class="fa arrow"></span></a>
				                <ul class="nav nav-second-level">
				                    <li>
				                        <a href="{{URL::to('/')}}/viewItems">View</a>
				                    </li>
				                    <li>
				                        <a href="{{URL::to('/')}}/items">Add</a>
				                    </li>
				                </ul>
				                <!-- /.nav-second-level -->
				            </li>
				            <li>
				                <a href="#"><i class="fa fa-files-o fa-fw"></i>Images<span class="fa arrow"></span></a>
				            	
				                <ul class="nav nav-second-level">
				                    <li>
				                        <a href="{{URL::to('/')}}/viewImages">View</a>
				                    </li>
				                    <li>
				                        <a href="{{URL::to('/')}}/images">Add</a>
				                    </li>
				                </ul>
				            </li>
				        </ul>
				    </div>
			    <!-- /.sidebar-collapse -->
				</div>
	<!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                    <div class = "row-fluid content">
        	@yield('content')
    	</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{URL::to('/')}}/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('/')}}/dist/js/sb-admin-2.js"></script>

</body>
</html>