@extends('layouts.app')
@section('css')
 <!-- Datatable CSS -->
 <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
<body class="app">
    {{-- <div class="app-wrapper">
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Application Form</h1>
                        </div>
                        </div>
                    </div>
                </section>      
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate">{{ __('Add New Record') }}</a>
                        </div>
                    </div>
                </div>
                @include('forms.modal.addmodal') 
            </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h3>List of Applicants</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @include('forms.table')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div> --}}
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
            
		    <div class="container-xl">
				
				@if(session()->has('result_msg'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session()->get('result_msg') }}
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"></span>
				  </div>
				@endif
                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Application Form</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        
							        <div>Hello, {{ Auth::user()->name ?? "user!" }}.&nbsp;This is where you can manage applicant record</div>
							    </div><!--//col-->
							    <div class="col-12 col-lg-3">
								
								    <button class="btn app-btn-primary" id="createminerals_modal_btn" data-toggle="modal" data-target="#ModalCreate2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
  <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
  <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"/>
</svg>Create An Application Form</a>
							    </div><!--//col-->
						    </div><!--//row-->
						  
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Minerals</h1>
                        
				    </div>
				
			    </div><!--//row-->
			  
				
			
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5 p-3">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left" id="form_table">
										<thead>
											<tr>
                                                <th class="cell">OTP Number</th>
                                                <th class="cell">Name Of Permittee</th>
                                                <th class="cell">Name of Applicant</th>
                                                <th class="cell">Buyer</th>
                                                <th class="cell">Total Tonnage</th>   
                                                <th class="cell">Date of Filling</th>
                                                <th class="cell">Updated At</th>
                                                <th class="cell" data-sortable="false">View</th>
                                                <th class="cell" data-sortable="false">Delete</th>
											</tr>
										</thead>
							
                                        <tbody>
										
											@forelse($forms as $item)
									
											<tr>
                                                <td>{{ $item->otp_number }}</td>
                                                <td>{{ $item->name_permitte }}</td>
                                                <td>{{ $item->name_applicant }}</td>
                                                <td>{{ $item->buyer }}</td>
                                                <td>{{ $item->tonnage }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td class="cell"><button class="btn-sm app-btn-secondary"  data-toggle="modal" data-form-info="{{$item}}" data-target="#ModalEdit2" >View</button></td>
                                                <td>
                                                    <form method="POST" action="{{ url('/form' . '/' . $item->id) }}" accept-charset="UTF-8">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Form" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                    </form>
                                                </td>
                                            
                                                @include('forms.modal.editmodal2')
											</tr>
											@empty
											<tr><td colspan="12">No Mineral record available.&nbsp; <a href="/minerals/create">Create one here.</a></td>
											@endforelse
										</tbody>	
									</table>
						        </div><!--//table-responsive-->  
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->		
			        </div><!--//tab-pane-->		        
				</div><!--//tab-content-->									
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->    
    </div>	
</body>
@include('forms.modal.addmodal2')
@endsection
@section('scripts')
<script src="/assets/js/form.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script> 
<script src="assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 
<script src="assets/js/add.js"></script> 
@endsection