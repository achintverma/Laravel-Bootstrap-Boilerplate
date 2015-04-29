@extends('admin')
	

@section('content')
	
	<div class="container">
		<div class="row">

			<div class="col-sm-6 white-box">
				<h3>Edit Cocktail: <?php echo $drink->drink_name;?></h3>


				<?php 
					//print_r($glasses);
				?>

				<form class="form-horizontal" action="{{URL::to('/')}}/admin/drink/add" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="form-group">

						<div class="col-sm-6 col-sm-offset-3">

							@foreach ($photos as $photo)
							<img src="{{URL::to('/')}}/uploads/{{$photo->filename}}" width="200"> <br/>
							<input type="button" class="btn btn-xs btn-danger" value="Remove Picture">
							@endforeach
						
						</div>

					</div>		


					<div class="form-group"> 
						<label class="col-sm-3 control-label">Upload File</label>
						<div class="col-sm-6">
							<input type="file" class="form-control" name="drink_file">
						</div>
						<div class="col-sm-3"></div>
					</div>


					<div class="form-group"> 
						<label class="col-sm-3 control-label">Drink Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="drink_name" value="{{$drink->drink_name}}">
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Glass Type</label>
						<div class="col-sm-6">
							<select class="form-control" name="glass">
								<option value="">Please select a glass</option>	
								@foreach($glasses as $g)					
									<option value="{{ $g->glass }}" @if ($drink->glass==$g->glass) selected="selected" @endif >{{ $g->glass }}</option>
								@endforeach	

							</select>
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Top Drink?</label>
						<div class="col-sm-6">
							<input type="checkbox" value="1" name="top_drink" @if ($drink->is_top_drink) checked @endif> Please check if to make it a top drink.
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Excerpt</label>
						<div class="col-sm-9">
							<textarea rows="4" cols="20" class="form-control" name="excerpt"> {{$drink->excerpt}} </textarea>
						</div>
						
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Ingredients</label>
						<div class="col-sm-9">
								
								<div id="ingredients-box">
								<?php 

								$max_ingredients = 10; 
								$default_count   = 5;


								for($i=1;$i<=$max_ingredients;$i++){

									if($i <= $default_count)
										$class = "show-ingr";
									else
										$class = "hide-ingr";

								 ?>	
								<div class="row ingredient-subform <?php echo $class;?>" id="ingredient-<?php echo $i;?>">
									<div class="col-sm-12">
										<input name="qty-<?php echo $i;?>" class="form-control same-line sm-field" placeholder="2 oz">
										<input name="ingr-<?php echo $i;?>" class="form-control same-line md-field ingredient-marker" placeholder="White Tequila">
										<input name="ingr-id-<?php echo $i;?>" data-id="<?php echo $i;?>" type="hidden" id="ingr-id-<?php echo $i;?>">
									</div>
								</div>
								<?php 
								}
								?>
								</div>

								<input class="btn btn-success" value="Add More Ingredients" onclick="addIngredientRow();">
						
						</div>
						
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Mixing Instructions</label>
						<div class="col-sm-9">
							<textarea rows="4" cols="20" class="form-control" name="instructions">{{$drink->description}}</textarea>
						</div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<input type="submit" value="Save Drink" class="btn btn-lg btn-success">
						</div>
					</div>

				</form>


			</div>

    	</div>
	</div>
@stop

@section('footerjs')
<script type="text/javascript">

var total_rows = <?php echo $default_count; ?>;
var current_ingr_selector;

$(document).ready(function(){


	$('.ingredient-marker').bind("focus", function(){


		// update the selector 

		var sel = $(this).attr("name").split("-")[1];
		
		

		$(this).autocomplete({
				delay: 100,
				minLength: 3,
				source: function(request, response) {
					$.getJSON("http://localhost:8000/get-ingredients/"+request.term, {
						// do not copy the api key; get your own at developer.rottentomatoes.com
						q: request.term,
						page_limit: 10
					}, function(data) {
						
						//alert(data);	

						// data is an array of objects and must be transformed for autocomplete to use
						 var array = data.error ? [] : $.map(data, function(val, key) {
							return {
								label: val,
								ingr_id: key
							};
						});
						//alert(array) 
						
						response(array);
					});
				},
				focus: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
				},
				select: function(event, ui) {
					// prevent autocomplete from updating the textbox
					//event.preventDefault();
					// navigate to the selected item's url
					//window.open(ui.item.url);
					//alert(ui.item.ingr_id);

					$("#ingr-id-"+sel).attr("value", ui.item.ingr_id);

				}
			});


	});

	$('.ingredient-marker').bind("blur", function(){
		$(this).attr("id","");
	});


});

	
function addIngredientRow()	
{	
	total_rows++;
	$("#ingredient-"+total_rows).show();

}

</script>	
@stop

@section('extraheader')
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/eggplant/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
		/*
		 * jQuery UI Autocomplete: Load Data via AJAX
		 * http://salman-w.blogspot.com/2013/12/jquery-ui-autocomplete-examples.html
		 */
		// $(function() {
		// 	$("#autocomplete").autocomplete({
		// 		delay: 500,
		// 		minLength: 3,
		// 		source: function(request, response) {
		// 			$.getJSON("http://api.rottentomatoes.com/api/public/v1.0/movies.json?callback=?", {
		// 				// do not copy the api key; get your own at developer.rottentomatoes.com
		// 				apikey: "6czx2pst57j3g47cvq9erte5",
		// 				q: request.term,
		// 				page_limit: 10
		// 			}, function(data) {
		// 				// data is an array of objects and must be transformed for autocomplete to use
		// 				var array = data.error ? [] : $.map(data.movies, function(m) {
		// 					return {
		// 						label: m.title + " (" + m.year + ")",
		// 						url: m.links.alternate
		// 					};
		// 				});
		// 				response(array);
		// 			});
		// 		},
		// 		focus: function(event, ui) {
		// 			// prevent autocomplete from updating the textbox
		// 			event.preventDefault();
		// 		},
		// 		select: function(event, ui) {
		// 			// prevent autocomplete from updating the textbox
		// 			event.preventDefault();
		// 			// navigate to the selected item's url
		// 			window.open(ui.item.url);
		// 		}
		// 	});
		// });
	</script>




@stop


