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
						<img src="{{URL::to('/')}}/images/drink-default.png" class="animated pulse">
						<div class="progress" style="height:5px; background-color:#ccc;" title="Cocktail Rating: <?php echo $drink->rating; ?> / 10">
						  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo 10*($drink->rating); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 10*($drink->rating); ?>%">
						    <span class="sr-only">40% Complete (success)</span>
						  </div>
						</div>

						<h3><?php echo $drink->drink_name; ?></h3>
						<p><?php echo substr($drink->description, 0, 100); ?> <?php if(strlen($drink->description) > 100) echo "...";?> </p>

						<span class="label label-small label-success">Orange Juice</span> 
						<span class="label label-small label-success">Gin</span>
						<span class="label label-small label-success">Tequila</span>

						

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

