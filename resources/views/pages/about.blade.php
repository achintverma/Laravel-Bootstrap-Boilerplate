@extends('admin')
	

	@section('content')
	

	<div class="container">

    <div class="row">
        <br/>
        <div class="col-md-8">

            <ul class="nav nav-pills" role="tablist">
              <li role="presentation" class="active"><a href="#">Cocktails <span class="badge">{{ $drinks->total()}}</span></a></li>
              <li role="presentation"><a href="#">Ingredients</a></li>
              <li role="presentation"><a href="#">Messages <span class="badge">3</span></a></li>
            </ul>

        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-success pull-right">Add a Drink</a>
        </div>

    </div>    
    <br/>
    <div class="row">

		<table class="table table-striped">
        
        <tr>
            <th>Drink Name</th>
            <th>Top Drink?</th>
            <th>Glass Type</th>
            <th>Views</th>
            <th>Rating</th>
            <th>Total Votes</th>
            <th>Last Updated</th>
            <th>Actions</th>

        </tr>    

        <?php foreach ($drinks as $drink): ?>
        <tr>
    		<td><?php echo $drink->drink_name; ?></td>
            <td><?php  if($drink->is_top_drink) echo "Yes"; ?></td>
    		<td><?php echo $drink->glass; ?></td>
            <td><?php echo $drink->views; ?></td>
    		<td><?php echo $drink->rating; ?></td>
    		<td><?php echo $drink->votes; ?></td>
            <td><?php if(strtotime($drink->updated_at) != -62169984000) echo date("D m, Y", strtotime($drink->updated_at)); else echo "Never Updated";?></td>
    		<td> 
                <a href="" class="btn btn-default btn-xs">Edit</a>
                <a href="" class="btn btn-default btn-xs">Delete</a>
            </td>
    	</tr>
        <?php endforeach; ?>
        
        </table>
    
    </div>
        
	</div>


	<?php echo $drinks->render(); ?>


	

	@stop