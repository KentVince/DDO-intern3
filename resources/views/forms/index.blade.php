@extends('layouts.app')
@section('css')
 <!-- Datatable CSS -->
 <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
<body class="app">
    <div class="app-wrapper">
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
    </div>
</body>
@endsection
@section('scripts')
<!-- Jquery CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('body').on('keyup', '#tonnage', function() 
    { 
    var tonnage = parseFloat($(this).val());
    var num_vehicle;
        if (tonnage <= 20) {
            num_vehicle = 1;
            $("#num_vehicle").val(num_vehicle);
        } else {
            num_vehicle = Math.ceil(tonnage / 20);
            $("#num_vehicle").val(num_vehicle);
        }
    var total_estimate_value = num_vehicle * 6000;
    $("#estimated_value").val(total_estimate_value);
    var total_extraction_fee = num_vehicle * 6000 * 0.1;
    $("#extraction_fee").val(total_extraction_fee); 
    }) 
});
</script>
<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 
<!-- Page Specific JS -->
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