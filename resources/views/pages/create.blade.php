@extends('luutaa')
	
@section('content')
	
	<form class="form-horizontal" action="http://localhost:8000/learning" method="post">
		
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">Name</label>  
    		<div class="col-sm-10"><input type="text" value="{{$name}}" name="name"></div>
		</div>
		<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">Name</label>  
    		<div class="col-sm-10"><input type="text" value="achintverma@luutaa.com" name="Email"> </div>
		</div>
		<div class="form-group">
    		
    		<div class="col-sm-10 col-sm-offset-2"><input type="submit" value="send" class="btn btn-success"></div>
		</div>


	</form>

@stop


@section('extrajs')
<script type="javascript" src="abc.js"></script>	
@stop