<div id="header">
	<div class="container">

		<div class="row">
			<div class="col-md-4">
				<img src="{{ URL::to('/')}}/images/logo.png">
			</div>
			<div class="col-md-8">

				@if(Auth::check())
				<div class="pull-right"> <br/>
				Hola, {{Auth::user()->name}} <a href="{{URL::to('/auth/logout')}}" class="btn btn-danger">Logout</a>
				</div>
				@endif

			</div>
		</div>

	</div>

</div> 