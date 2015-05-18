@extends('admin')
	

	@section('content')
	

	<div class="container">

    <div class="row">
        <br/>
        <div class="col-md-8">

            <ul class="nav nav-pills" role="tablist">
              <li role="presentation"><a href="{{URL::to('/admin/cocktails')}}">Cocktails</a></li>
              <li role="presentation"><a href="{{URL::to('/admin/ingredients')}}">Ingredients </a></li>
              <li role="presentation" class="active"><a href="#">Ingredient Categories <span class="badge">{{ $ingredient_types->count()}}</span></a></li>
            </ul>

        </div>
        <div class="col-md-4">
            <!-- <a href="" class="btn btn-success pull-right">Add an ingredient</a> -->
        </div>

    </div>    
    <br/>
    <div class="row">

       
		<table class="table table-striped">
        
        <tr>
            <th>#</th>
            <th>Ingredient Category</th>
            <!-- <th>Description</th> -->
            <th>Type</th>
            <th>Last Updated</th>
            <th>Actions</th>

        </tr>    

        <?php 
        $counter = 1; 
        $total = 0;
        foreach ($ingredient_types as $type): 

            $total += $type->ingredients->count();

            ?>
        <tr>
    		
            <td> <?php echo $type->id; ?></td>
            <td> <?php echo $type->type; ?></td>
            
            <td><?php echo $type->ingredients->count();?></td>
           
            <td><?php if(strtotime($type->updated_at) != -62169984000) echo date("D, M d, Y", strtotime($type->updated_at)); else echo "Never Updated";?></td>
    		<td> 
                <a href="" class="btn btn-default btn-xs">Edit</a>
                <a href="" class="btn btn-default btn-xs">Delete</a>
            </td>
    	</tr>
        <?php endforeach; ?>

        <tr class="info">
            <td></td>
            <td><strong>Total Ingredients Covered</strong></td>
            <td><strong><?php echo $total;?></strong></td>
            <td></td>
            <td></td>
        </tr>
        
        </table>
    
    </div>

	</div>

	@stop