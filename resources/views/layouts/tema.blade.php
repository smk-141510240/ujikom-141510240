<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Application</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}"><span>Aplikasi</span>&nbsp;Penggajian</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						@if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{ url('/pegawai') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Pegawai</a></li>

			<li><a href="{{ url('/jabatan') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Jabatan </a></li>

			<li><a href="{{ url('/golongan') }}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> Golongan</a></li>

			<li><a href="{{ url('/tunjangan') }}"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg> Tunjangan</a></li>

			<li><a href="{{ url('/kategori') }}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Kategori lembur</a></li>

			<li><a href="{{ url('/lembur') }}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Lembur pegawai</a></li>

			<li><a href="{{ url('/tunjangan_pegawai') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Tunjangan pegawai</a></li>

			
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div><!--/.row-->
		
		<!--/.row-->
		
		
		
		<!--/.row-->
								
		<!--/.col-->
			
			@yield('content')
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
</body>

</html>
