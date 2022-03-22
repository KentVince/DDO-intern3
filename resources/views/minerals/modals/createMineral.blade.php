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
					<input type="text" placeholder="Input Mineral Name" class="form-control @error('name_of_minerals') is-invalid @enderror"  id="name_of_minerals" name="name_of_minerals" required>
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