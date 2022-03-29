<!-- Modal -->
<div class="modal fade" id="ModalEdit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Applicant Details</h5>
        </div>
        <div class="modal-body">
            <form  method="post" id="updatelForm" >
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">OTP Number</label>
                        <input type="text" class="form-control" name="otp_number2" id="otp_number">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Processing Fee</label>
                        <input type="text" class="form-control" id="processing_fee" name="processing_fee2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name of Permittee</label>
                        <input type="text" class="form-control" name="name_permitte2">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Processing OR</label>
                        <input type="text" class="form-control" id="processing_or" name="processing_or2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Municipality</label>
                        <input type="text" class="form-control" id="municipality" name="municipality2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise Tax</label>
                        <input type="text" class="form-control" id="excise_tax" name="excise_tax2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Name of Applicant</label>
                        <input type="text" class="form-control" id="name_applicant" name="name_applicant2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise OR</label>
                        <input type="text" class="form-control" id="excise_or" name="excise_or2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="applicant_mail" name="applicant_mail2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction Fee</label>
                        <input type="text" class="form-control" id="extraction_fees" name="extraction_fee2" readonly="" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Kind of Mineral</label>
                        {{-- <input type="text" class="form-control" id="kind_mineral" name="kind_mineral" value="{{ $item->kind_mineral }}"> --}}
                        <select class="form-select" aria-label="Default select example" name="kind_mineral2" id="kind_mineral2"  required>
                            @foreach($minerals as $each_mineral)
						<option value="{{$each_mineral['id']}}" data-mineral-variable="{{$each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option>

						@endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction OR</label>
                        <input type="text" class="form-control" id="extraction_or" name="extraction_or2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Volume/Tonnage</label>
                        <input type="text" class="form-control" id="tonnages" name="tonnage2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Cosigned To</label>
                        <input type="text" class="form-control" id="buyer" name="buyer2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Estimated Value</label>
                        <input type="text" class="form-control" id="estimated_values" name="estimated_value2" readonly="" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="buyer_mail" name="buyer_mail2" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">No. of Vehicle</label>
                        <input type="text" class="form-control" id="num_vehicles" name="num_vehicle2" readonly="" >
                    </div>
                    <div class="col-md-6">
                        <label for="specification2" class="form-label">Specification</label>
                        <ul name="specification2" id="specs_group_edit">

                          </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
