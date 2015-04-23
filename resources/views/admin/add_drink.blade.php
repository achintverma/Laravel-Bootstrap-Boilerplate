@extends('admin')
	

@section('content')
	
	<div class="container">
		<div class="row">

			<div class="col-sm-6 white-box">
				<h3>Add a Cocktail</h3>


				<?php 
					//print_r($glasses);
				?>

				<form class="form-horizontal" action="{{URL::to('/')}}/admin/drink/add" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Drink Name</label>
						<div class="col-sm-6">
							<input type="text" id="autocomplete" class="form-control" name="drink_name">
						</div>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-3 control-label">Glass Type</label>
						<div class="col-sm-6">
							<select class="form-control" name="glass">
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
							<input type="checkbox" value="yes"> Please check if to make it a top drink.
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
						<label class="col-sm-3 control-label">Ingredients</label>
						<div class="col-sm-9">
								
								<div id="ingredients-box">
								<div class="row ingredient-subform">
									<div class="col-sm-12">
										<input name="qty-0" class="form-control same-line sm-field" placeholder="2 oz">
										<input name="ingr-0" class="form-control same-line md-field" placeholder="White Tequila">
										<input class="btn btn-default same-line xs-field" value="+" onclick="addIngredientRow();">
									</div>
								</div>
								</div>
								


						</div>
						
					</div>


					<div class="form-group"> 
						<label class="col-sm-3 control-label">Mixing Instructions</label>
						<div class="col-sm-9">
							<textarea rows="4" cols="20" class="form-control"></textarea>
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

var total_rows = 0;
	
function addIngredientRow()	
{	

	total_rows++;
	var form_row = '<div class="row ingredient-subform">\
									<div class="col-sm-12">\
										<input name="qty-'+total_rows+'" class="form-control same-line sm-field" placeholder="2 oz">\
										<input name="ingr-'+total_rows+'" class="form-control same-line md-field" placeholder="White Tequila">\
										<input class="btn btn-default same-line xs-field" value="+" onclick="addIngredientRow();">\
									</div>\
								</div>';

	document.getElementById('ingredients-box').innerHTML += form_row;							

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
		$(function() {
			$("#autocomplete").autocomplete({
				delay: 500,
				minLength: 3,
				source: function(request, response) {
					$.getJSON("http://api.rottentomatoes.com/api/public/v1.0/movies.json?callback=?", {
						// do not copy the api key; get your own at developer.rottentomatoes.com
						apikey: "6czx2pst57j3g47cvq9erte5",
						q: request.term,
						page_limit: 10
					}, function(data) {
						// data is an array of objects and must be transformed for autocomplete to use
						var array = data.error ? [] : $.map(data.movies, function(m) {
							return {
								label: m.title + " (" + m.year + ")",
								url: m.links.alternate
							};
						});
						response(array);
					});
				},
				focus: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
				},
				select: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
					// navigate to the selected item's url
					window.open(ui.item.url);
				}
			});
		});
	</script>




@stop


