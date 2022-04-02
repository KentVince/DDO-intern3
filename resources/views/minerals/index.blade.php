@extends('layouts.app')
@section('content')

<body class="app">
	@if(session()->has('result_msg'))
	
	<div aria-live="polite" aria-atomic="true" style="position: relative; z-index:10;">
		<div class="toast bg-primary text-white fade show" id="form_notif" style="position: absolute; top: 0; right: 0;">
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
	
    <div class="app-wrapper">
	

	    <div class="app-content pt-3 p-md-3 p-lg-4">

		    <div class="container-xl">
			
                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Non-Metallic Minerals</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        
							        <div>Hello, {{ Auth::user()->name ?? "user!" }}.&nbsp;This is where you can manage mineral record</div>
							    </div><!--//col-->
							    <div class="col-12 col-lg-3">
								
								    <button class="btn app-btn-primary" id="createminerals_modal_btn" data-toggle="modal" data-target="#exampleModal"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
  <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
  <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"/>
</svg>Create A Mineral Record</a>
							    </div><!--//col-->
						    </div><!--//row-->
						  
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Minerals</h1>
                        
				    </div>
				    {{-- <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
								<div class="col-auto">
									<a class="btn app-btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{ URL('/minerals/create') }}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"></path>
										<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
										<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"></path>
									  </svg>Create a Mineral Record</a></div>
									
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center " id="searchForm"  name="searchForm" action="/minerals/search">
                                     

									
					                    <div class="col-auto">
					                        <input type="text" name="search_query" id="search_val" class="form-control search-orders" value="{{old('search_query')}}" placeholder="Search">
					                    </div>
                                     
					                    <div class="col-auto">
					                    <button id="search_btn_link" type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					               
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
								    <select class="form-select w-auto" id="search_cat" name="search_cat">
										  <option selected value="all">All</option>
										  <option value="rec">Recency</option>
										  <option value="old">Oldest</option>
									</select>
							    </div>
						
							</form>
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									    Download CSV
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto--> --}}
			    </div><!--//row-->
			   
			    {{-- PANE TAB PANE --}}
			    {{-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav> --}}
				
			
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5 p-3">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left" id="minerals_table">
										<thead>
											<tr>
												<th class="cell">Mineral ID</th>
												<th class="cell">Mineral Name</th>
												<th class="cell">Created At</th>
												<th class="cell">Updated At</th>
												<th class="cell" data-sortable="false"></th>
												<th class="cell" data-sortable="false"></th>
											</tr>
										</thead>
							
										<tbody>
										
											@forelse($minerals as $each_mineral)
									
											<tr>
												<td class="cell searchable">{{$each_mineral->id}}</td>
												<td class="cell searchable" id="td_name"><span class="truncate">{{$each_mineral->name_of_minerals}}</span></td>
												<td class="cell">{{$each_mineral->created_at}}</td>
												<td class="cell"><span class="cell-data">{{$each_mineral->updated_at}}</td>
												<td class="cell"><button class="btn-sm app-btn-secondary" id="updateminerals_modal_btn" data-toggle="modal" data-mineral-info="{{$each_mineral}}" data-target="#updateModal" >View</button></td>
												<td class="cell">
													<form method="POST" id="delete_mineral" class="ignore-css" action="/minerals/{{ $each_mineral->id }}">
														@csrf
														@method('delete') 
													<button class="btn-sm app-btn-danger" id="delete_btn" type="button" onclick="confirmAction('mineral record','danger','delete_mineral')">Delete</button>
												</form>
											</td>
											</tr>
											@empty
											<tr><td colspan="12">No Mineral record available.&nbsp; <a href="" data-toggle="modal" data-target="#exampleModal">Create one here.</a></td>
											@endforelse
											
										
		
										</tbody>
										
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						{{-- <div class="d-flex justify-content-center">{{$minerals->links()}}</div> --}}
						{{-- @if($minerals->total() > $minerals->perPage())
						<div class="d-flex justify-content-center" id="pagination_btns" hidden>{{ $minerals->links() }}</div>
					   @endif --}}
						
						
			        </div><!--//tab-pane-->
			        
				</div><!--//tab-content-->
				
				
				<!-- Modal -->
		
		    </div><!--//container-fluid-->

	    </div><!--//app-content-->
      
    </div>
	
</body>
<!--//after body create modal --> 
@include('minerals.modals.createMineral')
</div>
@include('minerals.modals.updateMineral')
	 {{-- Update Modal --}}
	
	

@endsection
@section('scripts')

<script src="/assets/js/minerals.js"></script>
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