<div class="table-responsive">
    <table id ="myTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>OTP Number</th>
                <th>Name Of Permittee</th>
                <th>Name of Applicant</th>
                <th>Buyer</th>
                <th>Total Tonnage</th>
                <th>Date of Filling</th>
                <th>Updated At</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($forms as $item)
            <tr>
                <td>{{ $item->otp_number }}</td>
                <td>{{ $item->name_permitte }}</td>
                <td>{{ $item->name_applicant }}</td>
                <td>{{ $item->buyer }}</td>
                <td>{{ $item->tonnage }}</td>
                <td>{{ $item->created_at }}</td>
                {{-- <td>{{ $item->mineral->name_of_minerals }}</td> --}}
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$item->id}}">{{ __('View') }}</a>
                </td>
                <td>
                    <form method="POST" action="{{ url('/form' . '/' . $item->id) }}" accept-charset="UTF-8">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Form" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                    </form>
                </td>
                @include('forms.modal.editmodal')
            </tr>
        @endforeach
        </tbody>
    </table>



