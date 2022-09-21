<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Laravel Eloquent ORM</title>
	    <link rel="icon" type="image/x-icon" href="{{ asset('public/images/icons/favicon.png') }}">
	    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <link rel="stylesheet" type="text/css" 
	     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	</head>
	<body class="body">
		@yield('content')
		<script>
		  	@if(Session::has('message'))
		  		toastr.options =
		  		{
		  			"closeButton" : true,
		  			"progressBar" : true
		  		}
		  		toastr.success("{{ session('message') }}");
		  	@endif
		  	@if(Session::has('error'))
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
		  		toastr.error("{{ session('error') }}");
		  	@endif
		  	@if(Session::has('info'))
			  	toastr.options =
			  	{
			  		"closeButton" : true,
			  		"progressBar" : true
			  	}
		  		toastr.info("{{ session('info') }}");
		  	@endif
		  	@if(Session::has('warning'))
			  	toastr.options =
			  	{
			  		"closeButton" : true,
			  		"progressBar" : true
			  	}
		  		toastr.warning("{{ session('warning') }}");
		  	@endif
		</script>
	</body>
</html>