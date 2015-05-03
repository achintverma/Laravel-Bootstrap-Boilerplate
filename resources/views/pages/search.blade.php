@extends('luutaa')

@section('content')
	

	<div class="row">
		<div class="col-md-3">
			<div class="search-sidebar"></div>


		</div>

		<div class="col-md-9">

			<div class="row">

				

					<?php 
					foreach($drinks as $drink) { 
					?>
					<div class="col-md-4 drink-box">

						
						<?php if(count($drink->photos) > 0){ 
						?>
						@foreach ($drink->photos as $photo)
							<img src="{{URL::to('/')}}/uploads/{{$photo->filename}}" width="200"> <br/>
							
						@endforeach
						<?php 
						}else {
						?>

						<img src="{{URL::to('/')}}/images/drink-default.png" class="animated pulse">

						<?php 
						}
						?>
						
						<a href="{{URL::to('/')}}/drink/{{$drink->id}}"><h3>{{ $drink->drink_name }}</h3></a>

						<?php 
						if($drink->rating != "")
						{
						?>
						<p><?php echo $drink->rating; ?> voted by <?php echo $drink->votes; ?></p>	
						<?php 
						}
						?>
						<!-- <p><?php echo substr($drink->description, 0, 100); ?> <?php if(strlen($drink->description) > 100) echo "...";?> </p> -->

						<?php foreach($drink->ingredients as $ingredient)
						{?>	
							<span class="label label-small label-success"><?php echo $ingredient['ingredient'];?></span> 
						<?php 
						}
						?>

						

					</div>
					<?php
					}
					?>

				


			</div>

			<?php echo $drinks->render(); ?>


		</div>

	</div>

@stop

@section('headercss')

{!! HTML::style('css/animate.css') !!}
	
@stop

<script>
    $(document).ready(function () {
         // Animated Appear Element
        if(jQuery(window).width() >= 1024){ 
            $('.animated').appear(function() {
              var element = $(this);
              var animation = element.data('animation');
              var animationDelay = element.data('delay');
              if(animationDelay) {
                  setTimeout(function(){
                      element.addClass( animation + " visible" );
                      element.removeClass('hiding');
                  }, animationDelay);
              } else {
                  element.addClass( animation + " visible" );
                  element.removeClass('hiding');
              }               
            }, {accY: -150});
        }

    });
</script>

