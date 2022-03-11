<div class="modal fade" id="ModalCreate" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Application Form') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form action="{{ url('form') }}" method="post" >
                {!! csrf_field() !!}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">OTP Number</label>
                        <input type="text" class="form-control" name="otp_number" id="otp_number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Processing Fee</label>
                        <input type="text" class="form-control" id="processing_fee" name="processing_fee" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name of Permittee</label>
                        <input type="text" class="form-control" name="name_permitte" id="name_permitte" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Processing OR</label>
                        <input type="text" class="form-control" id="processing_or" name="processing_or" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Municipality</label>
                        <input type="text" class="form-control" id="municipality" name="municipality" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise Tax</label>
                        <input type="text" class="form-control" id="excise_tax" name="excise_tax" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Name of Applicant</label>
                        <input type="text" class="form-control" id="name_applicant" name="name_applicant" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Excise OR</label>
                        <input type="text" class="form-control" id="excise_or" name="excise_or" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="applicant_mail" name="applicant_mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction Fee</label>
                        <input type="text" class="form-control" id="extraction_fee" name="extraction_fee" readonly="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Kind of Mineral</label>
                        <input type="text" class="form-control" id="kind_mineral" name="kind_mineral" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Extraction OR</label>
                        <input type="text" class="form-control" id="extraction_or" name="extraction_or" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Volume/Tonnage</label>
                        <input type="text" class="form-control" id="tonnage" name="tonnage" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Cosigned To</label>
                        <input type="text" class="form-control" id="buyer" name="buyer" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Estimated Value</label>
                        <input type="text" class="form-control" id="estimated_value" name="estimated_value" readonly="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Mailing Address</label>
                        <input type="text" class="form-control" id="buyer_mail" name="buyer_mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">No. of Vehicle</label>
                        <input type="text" class="form-control" id="num_vehicle" name="num_vehicle" readonly="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Specification</label>
                        <input type="text" class="form-control" id="specification" name="specification" required>
                    </div>
                    <div class="col-12 float-end">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>