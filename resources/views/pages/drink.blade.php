@extends('luutaa')

@section('content')
	

	<div class="row">
		<div class="col-md-8">
			
			<div class="drink-image">
				<img src="http://dummyimage.com/600x400/ccc/fff&text=" width="100%" title="<?php echo $drink->drink_name;?>" alt="<?php echo $drink->drink_name;?>">
				<h1><?php echo $drink->drink_name;?></h1>
			</div>

		</div>

		<div class="col-md-4">

			<div class="row">

				<h3>Rating</h3>

				<p><?php echo $drink->rating;?> rated by <?php echo $drink->total_votes;?> Cocktail lovers</p>

				<h3>Ingredients</h3>
				<table class="table table-striped">

				<?php foreach($drink->ingredients as $ingredient){?>	

					<tr><td><?php echo $ingredient['pivot']['qty'];?></td><td><?php echo $ingredient['ingredient'];?></td></tr>
						
				<?php 
				}
				?>
				</table>

				<h3>Cocktail Preparation Instructions</h3>
				<p><?php echo $drink->description;?></p>
			</div>

	</div>

@stop




