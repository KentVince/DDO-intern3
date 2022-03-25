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
						<span aria-hidden="true">&times;</span>
				  </div>
				@endif
                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Application Form</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        <div>Hello, {{ Auth::user()->name ?? "user!" }}.&nbsp;This is where you can add new form</div>
							    </div><!--//col-->
							    <div class="col-12 col-lg-3">
                                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate">{{ __('Add New Record') }}</a>
                                    @include('forms.modal.addmodal')
							    </div>
						    </div>
					    </div>
				    </div>
			    </div>
				{{-- <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
                                    @include('forms.table')
						        </div>
						    </div>
						</div>
			        </div>
				</div> --}}
                <section class="content-header">
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
    </div>
</body>
@endsection
@section('scripts')
<!-- Jquery CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>
<script src="assets/js/add.js"></script>
{{-- <script src="assets/js/edit.js"></script>  --}}

<!-- Datatables CDN -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>
<!-- Boostrap CDN-->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
@endsection
