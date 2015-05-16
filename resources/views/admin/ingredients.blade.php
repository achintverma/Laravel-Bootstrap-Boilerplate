@extends('admin')
	

	@section('content')
	

	<div class="container">

    <div class="row">
        <br/>
        <div class="col-md-8">

            <ul class="nav nav-pills" role="tablist">
              <li role="presentation"><a href="{{URL::to('/admin')}}">Cocktails</a></li>
              <li role="presentation" class="active"><a href="#">Ingredients <span class="badge">{{ $ingredients->total()}}</span></a></li>
              <li role="presentation"><a href="{{URL::to('/admin/ingredient_categories')}}">Ingredient Categories</a></li>
            </ul>

        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-success pull-right">Add an ingredient</a>
        </div>

    </div>    
    <br/>
    <div class="row">

        <form class="form-inline" action="{{URL::to('/admin/ingredient_type/add')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<table class="table table-striped">
        
        <tr>
            <th><input type="checkbox" onclick="select_all();"></th>
            <th>Ingredient Name</th>
            <!-- <th>Description</th> -->
            <th>Type</th>
            <th>Last Updated</th>
            <th>Actions</th>

        </tr>    

        <?php 
        $counter = 1; 
        foreach ($ingredients as $ingredient): ?>
        <tr>
    		<td><input type="checkbox" name="ingredient-<?php echo $counter; $counter++;?>" value="<?php echo $ingredient->id;?>"></td>
            <td> <?php echo $ingredient->ingredient; ?></td>
            <!-- <td><?php echo substr($ingredient->description,0,100); ?></td> -->
            <td><?php echo $ingredient->ingredient_type['type'];?></td>
           
            <td><?php if(strtotime($ingredient->updated_at) != -62169984000) echo date("D m, Y", strtotime($ingredient->updated_at)); else echo "Never Updated";?></td>
    		<td> 
                <a href="" class="btn btn-default btn-xs">Edit</a>
                <a href="" class="btn btn-default btn-xs">Delete</a>
            </td>
    	</tr>
        <?php endforeach; ?>
        
        </table>
    
    </div>
        
    <div class="row">
        <div class="col-md-6">
            <?php echo $ingredients->render(); ?>
        </div>
        <div class="col-md-6">
                

                
                
                
                
                
            
        </div>
    </div>

    <div class="row">
                    
                    <div class="col-sm-3"><input class="form-control" name="ingredient_type" placeholder="Enter a New Type"></div>
                    <div class="col-sm-3">
                        <select name="existing_ingredient" class="form-control">
                        <option value="0">Assign to Existing Type</option>
                        @foreach($ingredient_types as $i_type)
                        <option value="{{$i_type->id}}">{{$i_type->type}}</option>
                        @endforeach

                </select></div>
                    <div class="col-sm-3"><input type="submit" value="Save" class="btn btn-success"></div>
                </div>

    </form>
	</div>


	




	

	@stop