@extends('admin')
	

@section('content')
	
	<div class="container">
		<div class="row">

			<div class="col-sm-6">

				<form class="form-horizontal">

					<legend>Add a Cocktail</legend>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Drink Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control">
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Top Drink?</label>
						<div class="col-sm-6">
							<input type="checkbox" value="yes"> Please Mark
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Excerpt</label>
						<div class="col-sm-6">
							<textarea rows="4" cols="20" class="form-control"></textarea>
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Mixing Instructions</label>
						<div class="col-sm-6">
							<textarea rows="4" cols="20" class="form-control"></textarea>
						</div>
						<div class="col-sm-3"></div>
					</div>

				</form>


			</div>

    	</div>
	</div>
@stop