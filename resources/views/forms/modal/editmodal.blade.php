<div class="modal fade updateModal" id="ModalEdit{{$item->id}}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Applicant Details') }}</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                        <label for="inputCity" class="form-label">Mineral Type</label><small>&nbsp; Currently :{{$item->mineral->name_of_minerals}} </small>
                        {{-- <input type="text" class="form-control" id="kind_mineral" name="kind_mineral" value="{{ $item->kind_mineral }}"> --}}
                        <select class="form-select" aria-label="Default select example" id="kind_mineral" name="mineral_id" required>
                            <option selected value="{{$item->mineral->id}}" data-mineral-variable="{{ $item->mineral->mineralSpecifications}}">{{$item->mineral->name_of_minerals}}</option>
                            @foreach($minerals as $each_mineral)
                            @if($each_mineral['name_of_minerals'] !== $item->mineral->name_of_minerals)
                            <option value="{{$each_mineral['id']}}" data-mineral-variable="{{ $each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option>
                            @endif
						    {{-- <option value="{'name':'{{$each_mineral['name_of_minerals']}}','id':'{{$each_mineral['id']}}'}" data-mineral-variable="{{ $each_mineral->mineralSpecifications}}">{{$each_mineral['name_of_minerals']}}</option> --}}
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
                        <input type="text" class="form-control" id="specification" name="specification" value="{{ $item->specification}}">
                    </div>
                    <div class="col-md-6" >
                        <label for="inputCity" class="form-label"> Specifications</label>
                    <ul class="list-group" id="specs_group">
                        {{-- @forelse($item->mineral->mineralSpecifications as $userSpecs)
                        <li class="list-group-item">{{$userSpecs->specification_name}}</li>
                        @empty
                        <h5>No record</h5>
                        @endforelse --}}

                      </ul>
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
{{-- <script>


// A $( document ).ready() block.
$( document ).ready(function() {
    alert( "ready!" );
    $(".modal").on("show.bs.modal", function(){


    // $(".modal-body1").html("");
});
$(".modal.updateModal").on("hidden.bs.modal", function(){
    id = $(this).attr('id')
      alert("modal closed");
      alert(id);
      $(this).find('form').trigger('reset');
    // $(".modal-body1").html("");
});
});

$('select#kind_mineral').on('change', function() {
    $('ul#specs_group').empty();
  alert( this.value );

  var mineralInfo = $(this).find(':selected').data('mineral-variable');

  for(let i=0;i<mineralInfo.length; i++){
      var currentSpec=Object.values(mineralInfo[i]);

     $(' #specs_group').append(`<li class="list-group-item">${currentSpec[2]}</li>`);

  }



});


    </script>
 --}}
