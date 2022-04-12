@extends('layouts.app')
@section('content')
<body class="app">
	@if(session()->has('result_msg'))
	
	<div aria-live="polite" aria-atomic="true" style="position: relative; z-index:10;">
		<div class="toast bg-primary text-white fade show" id="mineral_notif" style="position: absolute; top: 0; right: 0;">
		  <div class="toast-header ">
			<i class="fa-solid fa-badge-check"></i>
			<strong class="mr-auto">Notification</strong>
			<small>Today</small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			  <span aria-hidden="true" class="toggle-alert">&times;</span>
			</button>
		  </div>
		  <div class="toast-body">
		{{ session()->get('result_msg') }}
		  </div>
		</div>
	  </div>
	
	@endif
	@if ($errors->any())
    <div class="alert alert-danger">
       <ul>
          @foreach ($errors->all() as $error)
		  <div aria-live="polite" aria-atomic="true" style="position: relative; z-index:10;">
			<div class="toast bg-primary text-white fade show" id="mineral_notif" style="position: absolute; top: 0; right: 0;">
			  <div class="toast-header ">
				<i class="fa-solid fa-badge-check"></i>
				<strong class="mr-auto">Notification</strong>
				<small>Today</small>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				  <span aria-hidden="true" class="toggle-alert">&times;</span>
				</button>
			  </div>
			  <div class="toast-body">
			{{ $error }}
			  </div>
			</div>
		  </div>
          @endforeach
      </ul>
   </div>
@endif
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
            
		    <div class="container-xl">
				
		

	    </div><!--//app-content-->
      
    </div>
	
</body>
<!--//after body create modal --> 

	 {{-- Update Modal --}}
	
	

@endsection
@section('scripts')

<script src="/assets/js/specifications.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script> 
<script src="assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 
@endsection