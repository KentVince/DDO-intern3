
<form action="/form" method="post" >
<div class="modal fade" id="ModalCreate2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6>
            <div class="form-group row">
              <label  class="col-sm-6 col-form-label" >OTP Number:</label>
              <div class="col-sm-6">
              <input type="text" readonly class="form-control-plaintext" name="otp_number"  value="NM-{{ now()->year }}-{{$form_current_id}}">
              </div>
            </div>
          </h6>
        </div>
        <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm-4">
                      <div class="card bg-light">
                        <div class="card-body">
                          <strong>Operator</strong> 
                          <div class="form-row"> 
                            <div class="col-md-12">
                              <strong>Name of Permittee:</strong> 
                              <input type="text" class="form-control" name="name_permitte" id="name_permitte"  required>                              
                            </div>
                            <div class="col-md-12">
                              <strong>Name of Applicant:</strong>
                              <input type="text" class="form-control"  name="name_applicant" id="name_applicant" required >                             
                            </div>
                            <div class="col-md-12">
                              <strong>Mailing Address:</strong>
                              <input type="text" class="form-control"  name="applicant_mail" id="applicant_mail" required >                            
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
                                <strong>Province:</strong>
                                  <select class="form-select provincesList" aria-label="Default select example" name="province"  id="province_id"  required >
                                      <option selected value="">SELECT PROVINCE</option> 
                                        @foreach($provinces as $each_province)
                                      <option value="{{$each_province->provCode}}">{{$each_province->provDesc}}</option> 
                                        @endforeach
                                  </select>                                
                              </div>
                              <div class="col-md-12">
                                  <strong>Municipality:</strong>
                                  <select class="form-select municipalList" aria-label="Default select example" name="municipality"  id="municipals" required >
                                      <option  value="0" disabled="true" selected="true">MUNICIPALITY</option>
                                  </select>                                  
                              </div>
                              <div class="col-md-12">
                                  <strong>Barangay:</strong>
                                   <select class="form-select barangayList" aria-label="Default select example" name="barangay" id="brgy" required  >
                                      <option  value="0" disabled="true" selected="true">BARANGAY</option>
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
                                    <select class="form-select" aria-label="Default select example" name="mineral_id" id="kind_mineral" required >
                                        <option selected value="">SELECT</option>
                                          @foreach($minerals as $each_mineral)
                                        <option value="{{$each_mineral['id']}}" data-mineral-variable="{{$each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option>
                                          @endforeach
                                    </select>                                    
                                </div>
                                <div class="col-md-6">
                                    <strong>Specification:</strong>
                                    <select class="form-select" aria-label="Default select example" name="specification_id" id="specs_group" required>
                                        <option selected value="" class="default">Select</option>
                                    </select>                                   
                                </div>
                                <div class="col-md-12">
                                    <strong>Volume/Tonnage:</strong>
                                    <input type="number" class="form-control" id="tonnage" name="tonnage" required>
                                    <h6 class="text-danger">@error('tonnage'){{ $message }}@enderror</h6>
                                </div>
                                <div class="col-md-12">
                                    <strong>No. of Vehicle:</strong>
                                    <input type="number" class="form-control" id="num_vehicle" name="num_vehicle" readonly="" required >                                   
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
                                  <input type="number" class="form-control" id="estimated_value" name="estimated_value" readonly="" required>                                  
                                </div>
                                <div class="col-md-6">
                                    <strong>Extraction Fee:</strong>
                                    <input type="number" class="form-control" id="extraction_fee" name="extraction_fee" readonly="" required>                                    
                                </div>
                                <div class="col-md-6">
                                    <strong>Extraction OR:</strong>
                                    <input type="number" class="form-control"  name="extraction_or" required>   
                                </div>
                                <div class="col-md-6">
                                    <strong>Processing Fee:</strong>
                                    <input type="number" class="form-control"  name="processing_fee" required>
                                </div>
                                <div class="col-md-6">
                                    <strong>Processing OR:</strong>
                                    <input type="number" class="form-control"  name="processing_or" required>    
                                </div>
                                <div class="col-md-6">
                                    <strong>Excise Tax:</strong>
                                    <input type="number" class="form-control"  name="excise_tax" required>    
                                </div>
                                <div class="col-md-6">
                                    <strong>Excise OR:</strong>
                                    <input type="number" class="form-control"  name="excise_or"required >
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
                            <div class="col-md-12">
                                <strong>Cosigned To:</strong>
                                <input type="text" class="form-control"  name="buyer" id="buyer" required>                               
                            </div>
                            <div class="col-md-12">
                                <strong>Mailing Address:</strong>
                                <input type="text" class="form-control"  name="buyer_mail" id="buyer_mail"required >                                
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-secondary" >Add</button>
              </div>
        </div>
      </div>
    </div>
  </div>
</form>
