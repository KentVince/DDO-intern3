<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Mineral</h5>
        
        </div>
        <form class="settings-form" method="POST" id="updateMineralForm">
        <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Update Mineral Form<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                   
                </div>
                <div class="mb-3">
                    <label for="specification_name2" class="form-label">Specification Title</label>
                    <input type="text" class="form-control @error('specification_name2') is-invalid @enderror"  id="specification_name2" name="specification_name2" required>
                    @error('specification_name2')
                    <span class="invalid-feedback" role="alert">
                        <strong id ="specification_name2">{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="mineral_select2" class="form-label">Mineral Connection &nbsp;</label><small>Currently : </small> <small name="spec_input"> </small>
                  <select required class="form-select" aria-label="Default select example" name="mineral_select2">
                    <option selected value="">Choose:</option>
                    @foreach($minerals as $each_mineral)
                    <option value="{'name':'{{$each_mineral['name_of_minerals']}}','id':'{{$each_mineral['id']}}'}">{{$each_mineral['name_of_minerals']}}</option>
                    
                    @endforeach
                    </select>
                  @error('mineral_select2')
                  <span class="invalid-feedback" role="alert">
                    <strong id ="mineral_select2">{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn app-btn-primary">Update Mineral</button>
        </form>
        </div>
      </div>
    </div>