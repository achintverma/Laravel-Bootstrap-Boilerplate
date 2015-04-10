<html>
<head>
	<title>Create Page</title>
</head>
<body>

	<form action="http://localhost:8000/learning" method="post">

		Name <input type="text" value="{{$name}}" name="name"> <br/>
		Email <input type="text" value="achintverma@luutaa.com" name="Email"> 
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="submit" value="send">

	</form>


</body>
</html>