<html>
<head>
	<title>{{$page_title}}</title>
	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	{!! HTML::style('css/style.css') !!}
	{!! HTML::style('css/admin-style.css') !!}


	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

	@yield('extraheader')

</head>
<body>
	@include('includes.admin.header')

	<!--#this is header section-->

	<div class="container">

		@yield('content')


	</div>

	@include('includes.admin.footer')
	@yield('footerjs')
</body>
</html> 