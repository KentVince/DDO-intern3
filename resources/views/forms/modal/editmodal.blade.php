<div class="modal fade" id="ModalEdit{{$item->id}}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Applicant Details') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('form.update', $item->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">OTP Number</label>
                        <input type="text" class="form-control" name="otp_number" id="otp_number" value="{{ $item->otp_number }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Processing Fee</label>
                        <input type="text" class="form-control" id="processing_fee" name="processing_fee" value="{{ $item->processing_fee }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name of Permittee</label>
                        <input type="text" class="form-control" name="name_permitte" id="name_permitte" value="{{ $item->name_permitte }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Processing OR</label>
                        <input type="text" class="form-control" id="processing_or" name="processing_or" value="{{ $item->processing_or }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Municipality</label>
                        <input type="text" class="form-control" id="municipality" name="municipality" value="{{ $item->municipality }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" value="{{ $item->barangay }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise Tax</label>
                        <input type="text" class="form-control" id="excise_tax" name="excise_tax" value="{{ $item->excise_tax }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Name of Applicant</label>
                        <input type="text" class="form-control" id="name_applicant" name="name_applicant" value="{{ $item->name_applicant }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise OR</label>
                        <input type="text" class="form-control" id="excise_or" name="excise_or" value="{{ $item->excise_or }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="applicant_mail" name="applicant_mail" value="{{ $item->applicant_mail }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction Fee</label>
                        <input type="text" class="form-control" id="extraction_fees" name="extraction_fee" readonly="" value="{{ $item->extraction_fee }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Kind of Mineral</label>
                        {{-- <input type="text" class="form-control" id="kind_mineral" name="kind_mineral" value="{{ $item->kind_mineral }}"> --}}
                        <select class="form-select" aria-label="Default select example" name="kind_mineral" value="{{ $item->kind_mineral }}" required>
                            <option selected value="{{ $item->kind_mineral }}">Open this select menu</option>
                            @foreach($minerals as $each_mineral)
						<option value="{'name':'{{$each_mineral['name_of_minerals']}}','id':'{{$each_mineral['id']}}'}">{{$each_mineral['name_of_minerals']}}</option>
						
						@endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction OR</label>
                        <input type="text" class="form-control" id="extraction_or" name="extraction_or" value="{{ $item->extraction_or }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Volume/Tonnage</label>
                        <input type="text" class="form-control" id="tonnages" name="tonnage" value="{{ $item->tonnage }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Cosigned To</label>
                        <input type="text" class="form-control" id="buyer" name="buyer" value="{{ $item->buyer }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Estimated Value</label>
                        <input type="text" class="form-control" id="estimated_values" name="estimated_value" readonly="" value="{{ $item->estimated_value }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="buyer_mail" name="buyer_mail" value="{{ $item->buyer_mail }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">No. of Vehicle</label>
                        <input type="text" class="form-control" id="num_vehicles" name="num_vehicle" readonly="" value="{{ $item->num_vehicle }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Specification</label>
                        <input type="text" class="form-control" id="specification" name="specification" value="{{ $item->specification }}">
                    </div>
                    <div class="col-12 float-right">
                        <button type="submit" class="btn btn-warning">Edit</button>
                      </div>
                  </div>
            </form>
        </div>
      </div>
    </div>
</div>

