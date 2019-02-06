<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>@yield('title')</title>
</head>
<body>
	
	@section('nav')
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">itp-tunes</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav mr-auto">
	    <li class="nav-item">
	      <a class="nav-link" href="/genres">Genres</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="/tracks">Tracks</a>
	    </li>
	  </ul>
	</div>
	</nav>
	@show

	<div class="container-fluid">
		@yield('main')
	</div>
</body>
</html>
