<form  method="post" id="updatelForm" >
<div class="modal fade" id="ModalEdit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h6>
                <div class="form-group row">
                <label  class="col-sm-6 col-form-label" >OTP Number:</label>
                <div class="col-sm-6">
                    <input type="text" readonly class="form-control-plaintext" name="otp_number2" autocomplete="off" >
                  </div>
                </div>
                </h6>
        </div>
        <div class="modal-body">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-4">
                        <div class="card bg-light">
                          <div class="card-body">
                            <strong>Operator</strong> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <strong>Name of Permittee:</strong>
                                    <input type="text" class="form-control" name="name_permitte2" >
                                </div>
                                <div class="col-md-12">
                                    <strong>Name of Applicant:</strong>
                                    <input type="text" class="form-control" id="name_applicant" name="name_applicant2" >
                                </div>
                                <div class="col-md-12">
                                    <strong for="inputCity" class="form-label">Mailing Address:</strong>
                                    <input type="text" class="form-control" id="applicant_mail" name="applicant_mail2" >
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card bg-light">
                          <div class="card-body">
                            <strong>Source Origin</strong> 
                              <div class="form-row">
                                <div class="col-md-12">
                                  <strong>Province</strong>
                                    <select class="form-select provincesList2" aria-label="Default select example" name="province2"  id="province2"  required>
                                        <option selected value="">Select Province</option>
                                          @foreach($provinces as $each_province)
                                         <option value="{{$each_province->provCode}}">{{$each_province->provDesc}}</option> 
                                          @endforeach
                                    </select> 
                                  </div>
                                <div class="col-md-12">
                                    <strong>Municipality:</strong>
                                    <select class="form-select municipalList2" aria-label="Default select example" name="municipality2"  id="municipals2" required>
                                      <option  selected value="">Barangay</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <strong>Barangay:</strong>
                                      <select class="form-select barangayList2" aria-label="Default select example" name="barangay2" id="brgy2"  required>
                                        <option  selected value="">Barangay</option>
                                      </select>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card bg-light">
                          <div class="card-body">
                              <div class="form-row">
                                <div class="col-md-6">
                                  <strong>Kind of Mineral:</strong>
                                    <select class="form-select" aria-label="Default select example" name="mineral_id2" id="kind_mineral2"  required>
                                      <option value="">Select...</option>
                                        @foreach($minerals as $each_mineral)
                                      <option value="{{$each_mineral['id']}}" data-mineral-variable="{{$each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <strong>Specification:</strong>
                                      <select class="form-select" aria-label="Default select example" name="specification" id="specs_group_edit" required>
                                        <option selected value="" class="default">Select</option>
                                      </select>
                                </div>
                                  <div class="col-md-12">
                                      <strong>Volume/Tonnage:</strong>
                                      <input type="text" class="form-control" id="tonnages" name="tonnage2" required >
                                  </div>
                                  <div class="col-md-12">
                                      <strong>No. of Vehicle:</strong>
                                      <input type="text" class="form-control" id="num_vehicles" name="num_vehicle2" readonly=""  required>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <br>
                        <div class="card bg-light">
                          <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                  <strong>Estimated Value:</strong>
                                  <input type="text" class="form-control" id="estimated_values" name="estimated_value2"  readonly="" >
                                </div>
                                <div class="col-md-6">
                                    <strong>Extraction Fee</strong>
                                    <input type="text" class="form-control" id="extraction_fees" name="extraction_fee2"  readonly="" >
                                </div>
                                <div class="col-md-6">
                                    <strong>Excise OR</strong>
                                    <input type="text" class="form-control" id="excise_or" name="excise_or2" >
                                </div>
                                <div class="col-md-6">
                                    <strong>Processing Fee</strong>
                                    <input type="text" class="form-control" id="processing_fee" name="processing_fee2" >
                                </div>
                                
                                <div class="col-md-6">
                                    <strong>Processing OR</strong>
                                    <input type="text" class="form-control" id="processing_or" name="processing_or2" >
                                </div>
                                <div class="col-md-6">
                                    <strong>Excise Tax</strong>
                                    <input type="text" class="form-control" id="excise_tax" name="excise_tax2" >
                                </div>
                                <div class="col-md-6">
                                    <strong>Extraction OR</strong>
                                    <input type="text" class="form-control" id="extraction_or" name="extraction_or2" >
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <br>
                        <div class="card bg-light">
                          <div class="card-body">
                            <strong>Buyer</strong>
                              <div class="col-md-6">
                                <strong>Cosigned To</strong>
                                <input type="text" class="form-control" id="buyer" name="buyer2" >
                              </div>
                            <div class="col-md-6">
                                <strong>Mailing Address</strong>
                                <input type="text" class="form-control" id="buyer_mail" name="buyer_mail2" >
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning">Save changes</button>
            </div>  
        </div>
      </div>
    </div>
  </div>
 </form>
