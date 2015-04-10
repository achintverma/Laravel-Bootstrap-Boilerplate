@extends('luutaa')
	

	@section('content')
	<h1>All Drinks</h1>

	<div class="container">

		<table class="table table-bordered table-striped">
    <?php foreach ($drinks as $drink): ?>

    	<tr>
    		<td><?php echo $drink->drink_name; ?></td>
    		<td><?php echo $drink->glass; ?></td>
    		<td><?php echo $drink->rating; ?></td>
    		<td><?php echo $drink->total_votes; ?></td>
    		
    	</tr>

    <?php endforeach; ?>
    </table>
    

	</div>

	<?php echo $drinks->render(); ?>


	

	@stop