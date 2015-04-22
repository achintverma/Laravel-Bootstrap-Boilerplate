@extends('admin')
	

@section('content')
	
	<div class="container">
		<div class="row">

			<div class="col-sm-6 white-box">
				<h3>Add a Cocktail</h3>


				<?php 
					//print_r($glasses);
				?>

				<form class="form-horizontal">

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Drink Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control">
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Glass Type</label>
						<div class="col-sm-6">
							<select class="form-control">
								<option value="">Please select a glass</option>	
								<?php 
								foreach ($glasses as $g) {
									?>
									<option value="<?php echo $g->glass;?>"><?php echo $g->glass;?></option>
									<?php 
								}	
								?>

							</select>
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
						<div class="col-sm-9">
							<textarea rows="4" cols="20" class="form-control"></textarea>
						</div>
						
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Mixing Instructions</label>
						<div class="col-sm-9">
							<textarea rows="4" cols="20" class="form-control"></textarea>
						</div>
						
					</div>

				</form>


			</div>

    	</div>
	</div>
@stop