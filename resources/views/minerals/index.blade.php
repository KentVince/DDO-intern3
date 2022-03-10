@extends('layouts.app')
@section('content')
<body class="app">
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
            
		    <div class="container-xl">
				<p id="table_results" hidden>TABLE RESULTS</p>
				@if(session()->has('result_msg'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session()->get('result_msg') }}
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				  </div>
				@endif
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
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Minerals</h1>
                        
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
								<div class="col-auto">
									<a class="btn app-btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{ URL('/minerals/create') }}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"></path>
										<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
										<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"></path>
									  </svg>Create a Mineral Record</a></div>
									
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center " id="searchForm"  name="searchForm">
                                        
										 
					                    <div class="col-auto">
					                        <input type="text" name="search" id="searchInput" class="form-control search-orders" placeholder="Search">
					                    </div>
                                     
					                    <div class="col-auto">
					                        <a id="search_btn" class="btn app-btn-secondary">Search</a>
					                    </div>
					               
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
								    <select class="form-select w-auto" id="search_cat">
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
				    </div><!--//col-auto-->
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
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left" id="minerals_table">
										<thead>
											<tr>
												<th class="cell">Mineral ID</th>
												<th class="cell">Mineral Name</th>
												<th class="cell">Created At</th>
												<th class="cell">Updated At</th>
												<th class="cell"></th>
												<th class="cell"></th>
											</tr>
										</thead>
							
										<tbody>
										
											@forelse($minerals as $each_mineral)
									
											<tr>
												<td class="cell searchable">{{$each_mineral->id}}</td>
												<td class="cell searchable"><span class="truncate">{{$each_mineral->name_of_minerals}}</span></td>
												<td class="cell">{{$each_mineral->created_at}}</td>
												<td class="cell"><span class="cell-data">{{$each_mineral->updated_at}}</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="/minerals/{{$each_mineral->id}}">View</a></td>
												<td class="cell">
													<form method="POST" class="ignore-css" action="/minerals/{{ $each_mineral->id }}">
														@csrf
														@method('delete')
													<button class="btn-sm app-btn-danger" onclick="return confirm('Are you sure you want to delete this mineral record?');">Delete</button>
												</form>
											</td>
											</tr>
											@empty
											<tr><td colspan="12">No Mineral record available.&nbsp; <a href="/minerals/create">Create one here.</a></td>
											@endforelse
											
										
		
										</tbody>
										
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<div class="d-flex justify-content-center">{{$minerals->links()}}</div>
					
						
						
			        </div><!--//tab-pane-->
			        
				</div><!--//tab-content-->
				
				
				<!-- Modal -->

		    </div><!--//container-fluid-->

	    </div><!--//app-content-->
      
    </div>
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Create a Mineral</h5>
		
		</div>
		<form class="settings-form" method="POST" action="/minerals" id="mineral_form">
		<div class="modal-body">
		
				@csrf
				<div class="mb-3">
					<label for="setting-input-1" class="form-label">Create Mineral Form<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
				   
				</div>
				<div class="mb-3">
					<label for="name_of_minerals" class="form-label">Mineral Title</label>
					<input type="text" class="form-control @error('name_of_minerals') is-invalid @enderror"  id="name_of_minerals" name="name_of_minerals" required>
					@error('name_of_minerals')
					<span class="invalid-feedback" role="alert">
						<strong id ="name_of_minerals_err">{{ $message }}</strong>
					</span>
				@enderror
				</div>
		
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn app-btn-primary">Create A Mineral</button>
		</form>
		</div>
	  </div>
	</div>
	 
 

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	// check if error class is triggered.

	if($('span.invalid-feedback strong#name_of_minerals_err').text()!=""){
		$("#createminerals_modal_btn").trigger("click");

	}else{
		console.log($('span.invalid-feedback strong').text())
	}
	// clear modal error class if detected that it has been closed.
	$('.modal').on('hidden.bs.modal', function(e)
    { 
		$("#name_of_minerals").removeClass('is-invalid');
    }) ;

});

</script>
<script>
		function myFunction(item, index) {
  text += index + ": " + item + "<br>"; 
}
	var doAjaxSearch = function(searchCat,searchInput) {
		alert(searchCat+"CATEGORY")
		alert("FULL LINK"+'/minerals/search/'+searchCat+'/'+searchInput);
    $.ajax({
       url: '/minerals/search/'+searchCat+'/'+searchInput, // .asp?
       type: 'GET',
       data: { 'searchCat': searchCat , 'searchInput':searchInput},
       success: function( response ) {
	 $('#table_results').text(response);
		
// 		for (let key in response) {
//   alert(response[key]['name_of_minerals']);
// }

		
       },
	   error: function (xhr, ajaxOptions, thrownError) {
    alert(xhr.status);
    alert(thrownError);
  }
    });
};
	$('#search_btn').click(function() {
    let searchCat = $('select#search_cat').val();
	let searchInput=$('#searchInput').val();
    alert(searchCat+searchInput);
	doAjaxSearch(searchCat,searchInput)


});
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();
	console.log(this);
    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td.searchable").each(function () {
			console.log("each"+$(this).text());
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
	</script>

<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script> 
<script src="assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 
@endsection