@extends('layouts.app')
@section('content')
<body class="app">
    <div class="app-wrapper">
	    
        <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">		

            <h1 class="app-page-title">Mineral Creation</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Create Mineral</h3>
                    <div class="section-intro">You can create your minerals by filling out the form. <a href="help.html">Learn more</a></div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        
                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action="/minerals">
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
                                    <input type="text" class="form-control @error('name_of_minerals') is-invalid @enderror" id="name_of_minerals" name="name_of_minerals" required>
                                    @error('name_of_minerals')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <button type="submit" class="btn app-btn-primary" >Create Mineral Record</button>
                            </form>
                        </div><!--//app-card-body-->
                        
                    </div><!--//app-card-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
@section('scripts')
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script> 
<script src="assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 
@endsection