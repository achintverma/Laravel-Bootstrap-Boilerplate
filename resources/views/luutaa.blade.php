<html>
<head>
	<title>{{$page_title}}</title>
	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	{!! HTML::style('css/style.css') !!}

	@yield('headercss')
	@yield('headerjs')

</head>
<body>
	@include('includes.header')

	<!--#this is header section-->

	<div class="container">

		@yield('content')


	</div>

	@include('includes.footer')
	@yield('footerjs')
</body>
</html>