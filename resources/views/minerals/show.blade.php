@extends('layouts.app')
@section('content')
<body class="app">
    <div class="app-wrapper">
	    
        <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">		
            <div class="app-card shadow-sm mb-4 border-left-decoration">
                <div class="inner">
                    <div class="app-card-body p-4">
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-12">
                                <h3 class="mb-3">Mineral Profile</h3>
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mineral Title</strong></div>
									        <div class="item-data">{{$minerals->name_of_minerals}}</div>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="/minerals/{{ $minerals->id }}/edit">Change</a>
                                            <form method="POST" class="ignore-css" action="/minerals/{{ $minerals->id }}">
                                                @csrf
                                                @method('delete')
                                            <button class="btn-sm app-btn-danger" onclick="return confirm('Are you sure you want to delete this mineral record?');">Delete</button>
                                            </form>
									    </div><!--//col-->
                                       
                                        
                                       
								    </div><!--//row-->
							    </div>
                                
                            </div><!--//col-->
                           
                        </div><!--//row-->

                    </div><!--//app-card-body-->
                    
                </div><!--//inner-->
            </div>
         
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Mineral Specification</h1>
                    
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto"><a class="btn app-btn-primary" href="{{ URL('/minerals/caryl') }}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"></path>
                                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
                                        <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"></path>
                                      </svg>Create a Specification Record</a></div>
                                    <div class="col-auto">
                                        <input type="text" id="search" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                   
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>
                                
                            </div><!--//col-->
                            <div class="col-auto">
                                
                                <select class="form-select w-auto" >
                                      <option selected value="option-1">All</option>
                                      <option value="option-2">This week</option>
                                      <option value="option-3">This month</option>
                                      <option value="option-4">Last 3 months</option>
                                      
                                </select>
                            </div>
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
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
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
                                     
                                        @forelse($minerals->mineralSpecifications as $each_mineral)
                                
                                        <tr>
                                            <td class="cell searchable">{{$each_mineral->id}}</td>
                                            <td class="cell searchable"><span class="truncate">{{$each_mineral->specification_name}}</span></td>
                                            <td class="cell ">{{$each_mineral->created_at}}</td>
                                            <td class="cell"><span class="cell-data">{{$each_mineral->updated_at}}</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="/minerals/{{$each_mineral->id}}/show">View</a></td>
                                           
                                        </tr>
                                        @empty
                                        <tr><td colspan="12">No Specification record collected.&nbsp; <a href="/minerals/caryl">Create one here.</a></td>
                                        @endforelse
                                        

     
                                    </tbody>
                                    
                                </table>
                            </div><!--//table-responsive-->
                           
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                    {{-- <div class="d-flex justify-content-center">{{$mineral_specs->links()}}</div> --}}
                    
                </div><!--//tab-pane-->
            
            </div><!--//tab-content-->
        </div>
    </div>
</div>
</body>
@endsection
@section('scripts')
<script>
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