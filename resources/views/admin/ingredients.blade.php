@extends('admin')
	

	@section('content')
	

	<div class="container">

    <div class="row">
        <br/>
        <div class="col-md-8">

            <ul class="nav nav-pills" role="tablist">
              <li role="presentation"><a href="#">Cocktails</a></li>
              <li role="presentation" class="active"><a href="#">Ingredients <span class="badge">{{ $ingredients->total()}}</span></a></li>
              <li role="presentation"><a href="#">Ingredient Categories</a></li>
            </ul>

        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-success pull-right">Add an ingredient</a>
        </div>

    </div>    
    <br/>
    <div class="row">

		<table class="table table-striped">
        
        <tr>
            <th><input type="checkbox" onclick="select_all();"></th>
            <th>Ingredient Name</th>
            <!-- <th>Description</th> -->
            <th>Type</th>
            <th>Last Updated</th>
            <th>Actions</th>

        </tr>    

        <?php foreach ($ingredients as $ingredient): ?>
        <tr>
    		<td><input type="checkbox" name="ingr-<?php echo $ingredient->id;?>"></td>
            <td> <?php echo $ingredient->ingredient; ?></td>
            <!-- <td><?php echo substr($ingredient->description,0,100); ?></td> -->
            <td><?php echo $ingredient->type; ?></td>
           
            <td><?php if(strtotime($ingredient->updated_at) != -62169984000) echo date("D m, Y", strtotime($ingredient->updated_at)); else echo "Never Updated";?></td>
    		<td> 
                <a href="" class="btn btn-default btn-xs">Edit</a>
                <a href="" class="btn btn-default btn-xs">Delete</a>
            </td>
    	</tr>
        <?php endforeach; ?>
        
        </table>
    
    </div>
        
	</div>


	<?php echo $ingredients->render(); ?>


	

	@stop