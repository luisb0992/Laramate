@if(Session::has('flash_message'))
	<div class="row">
	  <div class="col-sm-6 col-md-offset-3">
	    <div class="alert {{ Session::get('flash_class') }} alert-dismissible fade show" role="alert">
	      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	      <strong class="text-center">{{Session::get('flash_message')}}</strong>
	  	</div>
	  </div>
	</div>
@endif
