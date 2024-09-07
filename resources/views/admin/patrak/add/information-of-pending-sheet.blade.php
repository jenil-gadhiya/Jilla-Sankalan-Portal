<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.pending_sheet') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">પત્રક-5 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ :પડતર કાગળોની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો								
                </h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="3">કક્ષા</th>
                            <th rowspan="3">માસનું નામ</th>
                            <th rowspan="3">માસની શરૂઆતમાં બાકી કાગળો </th>
                            <th rowspan="3">માસ દરમ્યાન નવા મળેલ કાગળો</th>
                            <th rowspan="3">કુલ નિકાલ કરવાપાત્ર કાગળો</th>
                            <th rowspan="3">માસ દરમ્યાન નિકાલ કરેલ કાગળો</th>
                            <th rowspan="3">માસ અંતે બાકી કાગળો </th>
                            <th rowspan="3">15 દિવસ ઉપરના કાગળો</th>
                            <th rowspan="3">રિમાર્ક્સ</th>
                        </tr>

                        <tbody align="center">
                            <tr align="center">
                                
                                {{-- Check for patark is filled or not --}}
                                @if ($status == 1)
                                    <input id="sr_no" type="hidden" class="form-control @error('sr_no') is-invalid @enderror" name="sr_no" value="{{ $counter++; }}" autocomplete="sr_no" readonly style="width: 8rem; text-align: center;">

                                    @error('sr_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <td>{{ $designation->designation_name }}</td>
                                    <td>
                                        <input id="month_name" type="text" class="form-control @error('month_name') is-invalid @enderror" name="month_name" value="{{ $month_name }}" autocomplete="month_name" readonly style="width: 8rem; text-align: center;">

                                        @error('month_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_at_start_of_month" type="text" class="form-control @error('sheets_pending_at_start_of_month') is-invalid @enderror" name="sheets_pending_at_start_of_month" value="{{ $old_data->sheets_pending_at_start_of_month}}" autocomplete="sheets_pending_at_start_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('sheets_pending_at_start_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_sheets_received_during_month" type="text" class="form-control @error('new_sheets_received_during_month') is-invalid @enderror" name="new_sheets_received_during_month" value="{{ $old_data->new_sheets_received_during_month }}" autocomplete="new_sheets_received_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_sheets_received_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_sheets_to_be_disposed" type="text" class="form-control @error('total_sheets_to_be_disposed') is-invalid @enderror" name="total_sheets_to_be_disposed" value="{{ $old_data->total_sheets_to_be_disposed }}" autocomplete="total_sheets_to_be_disposed" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_sheets_to_be_disposed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_disposed_during_month" type="text" class="form-control @error('sheets_disposed_during_month') is-invalid @enderror" name="sheets_disposed_during_month" value="{{ $old_data->sheets_disposed_during_month }}" autocomplete="sheets_disposed_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('sheets_disposed_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_at_end_of_month" type="text" class="form-control @error('sheets_pending_at_end_of_month') is-invalid @enderror" name="sheets_pending_at_end_of_month" value="{{ $old_data->sheets_pending_at_end_of_month }}" autocomplete="sheets_pending_at_end_of_month"  readonly style="width: 8rem; text-align: center;" >

                                        @error('sheets_pending_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_above_15_days" type="text" class="form-control @error('sheets_pending_above_15_days') is-invalid @enderror" name="sheets_pending_above_15_days" value="{{ $old_data->sheets_pending_above_15_days }}" autocomplete="sheets_pending_above_15_days" style="width: 8rem; text-align: center;" >

                                        @error('sheets_pending_above_15_days')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="remarks" type="text" class="form-control @error('remarks') is-invalid @enderror" name="remarks" value="{{ $old_data->remarks }}" autocomplete="remarks" style="width: 8rem; text-align: center;">

                                        @error('remarks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>

                                @else

                                    {{-- Patark is not filled --}}
                                    <input id="sr_no" type="hidden" class="form-control @error('sr_no') is-invalid @enderror" name="sr_no" value="{{ $counter++; }}" autocomplete="sr_no" readonly style="width: 8rem; text-align: center;">

                                    @error('sr_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <td>{{ $designation->designation_name }}</td>
                                    <td>
                                        <input id="month_name" type="text" class="form-control @error('month_name') is-invalid @enderror" name="month_name" value="{{ $month_name }}" autocomplete="month_name" readonly style="width: 8rem; text-align: center;">

                                        @error('month_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_at_start_of_month" type="text" class="form-control @error('sheets_pending_at_start_of_month') is-invalid @enderror" name="sheets_pending_at_start_of_month" value="{{ old('sheets_pending_at_start_of_month') }}" autocomplete="sheets_pending_at_start_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('sheets_pending_at_start_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_sheets_received_during_month" type="text" class="form-control @error('new_sheets_received_during_month') is-invalid @enderror" name="new_sheets_received_during_month" value="{{ old('new_sheets_received_during_month') }}" autocomplete="new_sheets_received_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_sheets_received_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_sheets_to_be_disposed" type="text" class="form-control @error('total_sheets_to_be_disposed') is-invalid @enderror" name="total_sheets_to_be_disposed" value="{{ old('total_sheets_to_be_disposed') }}" autocomplete="total_sheets_to_be_disposed" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_sheets_to_be_disposed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_disposed_during_month" type="text" class="form-control @error('sheets_disposed_during_month') is-invalid @enderror" name="sheets_disposed_during_month" value="{{ old('sheets_disposed_during_month') }}" autocomplete="sheets_disposed_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('sheets_disposed_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_at_end_of_month" type="text" class="form-control @error('sheets_pending_at_end_of_month') is-invalid @enderror" name="sheets_pending_at_end_of_month" value="{{ old('sheets_pending_at_end_of_month') }}" autocomplete="sheets_pending_at_end_of_month" readonly style="width: 8rem; text-align: center;" >

                                        @error('sheets_pending_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="sheets_pending_above_15_days" type="text" class="form-control @error('sheets_pending_above_15_days') is-invalid @enderror" name="sheets_pending_above_15_days" value="{{ old('sheets_pending_above_15_days') }}" autocomplete="sheets_pending_above_15_days" style="width: 8rem; text-align: center;" >

                                        @error('sheets_pending_above_15_days')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="remarks" type="text" class="form-control @error('remarks') is-invalid @enderror" name="remarks" value="{{ old('remarks') }}" autocomplete="remarks" style="width: 8rem; text-align: center;">

                                        @error('remarks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                @endif
                                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div align="center">
            <button type="submit"  class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">{{ __('Submit') }}</span>
            </button>
        </div>

    </form>

    @endsection

    @section('scripts')

        <script>

            function calculation() {
                var txtFirstNumberValue = document.getElementById('sheets_pending_at_start_of_month').value;
                var txtSecondNumberValue = document.getElementById('new_sheets_received_during_month').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_sheets_to_be_disposed').value = result;
                }


                var txtFirstNumberVal = document.getElementById('total_sheets_to_be_disposed').value;
                var txtSecondNumberVal = document.getElementById('sheets_disposed_during_month').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;

                var result1 = parseInt(txtFirstNumberVal) - parseInt(txtSecondNumberVal);
                if (!isNaN(result1)) {
                    document.getElementById('sheets_pending_at_end_of_month').value = result1;
                }
            }

        </script>
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>