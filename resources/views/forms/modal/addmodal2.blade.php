<!-- Modal -->
<div class="modal fade" id="ModalCreate2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Application Form</h5>
        </div>
        <div class="modal-body">
            <form action="/form" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm-7">
                      <div class="card bg-light">
                        <div class="card-body">
                         
                          <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">OTP Number</label>
                                <input type="text" class="form-control" name="otp_number"  readonly  value="NM-{{ now()->year }}-{{$form_current_id}}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name of Permittee</label>
                                <input type="text" class="form-control" name="name_permitte"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Name of Applicant</label>
                                <input type="text" class="form-control"  name="name_applicant" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Province</label>
                                <input type="text" class="form-control" name="province" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Municipality</label>
                                <input type="text" class="form-control" name="municipality" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Barangay</label>
                                <input type="text" class="form-control"  name="barangay" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Mailing Address</label>
                                <input type="text" class="form-control"  name="applicant_mail" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Cosigned To</label>
                                <input type="text" class="form-control"  name="buyer" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Mailing Address</label>
                                <input type="text" class="form-control"  name="buyer_mail" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="card bg-light">
                        <div class="card-body">
                          
                            <div class="col-md-12">
                                <label for="inputCity" class="form-label">Kind of Mineral</label>
                                <select class="form-select" aria-label="Default select example" name="mineral_id" id="kind_mineral" required>
                                    <option selected value="">Select</option>
                                        @foreach($minerals as $each_mineral)
                                    <option value="{{$each_mineral['id']}}" data-mineral-variable="{{$each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="specification" class="form-label">Specification</label>
                                <ul name="specification" id="specs_group"></ul>
                            </div>
                            <div class="col-md-12">
                                <label for="inputCity" class="form-label">Volume/Tonnage</label>
                                <input type="text" class="form-control" id="tonnage" name="tonnage" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputCity" class="form-label">No. of Vehicle</label>
                                <input type="text" class="form-control" id="num_vehicle" name="num_vehicle" readonly="" required>
                            </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <div class="card bg-light">
                          <div class="card-body">
                           
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Estimated Value</label>
                                    <input type="text" class="form-control" id="estimated_value" name="estimated_value" readonly="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Extraction Fee</label>
                                    <input type="text" class="form-control" id="extraction_fee" name="extraction_fee" readonly="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Extraction OR</label>
                                    <input type="text" class="form-control"  name="extraction_or" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Processing Fee</label>
                                    <input type="text" class="form-control"  name="processing_fee" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Processing OR</label>
                                    <input type="text" class="form-control"  name="processing_or" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Excise Tax</label>
                                    <input type="text" class="form-control"  name="excise_tax" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Excise OR</label>
                                    <input type="text" class="form-control"  name="excise_or" required>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Add</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
