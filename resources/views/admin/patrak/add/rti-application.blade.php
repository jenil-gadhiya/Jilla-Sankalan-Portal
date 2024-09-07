<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.rti_application') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">આરટીઆઇ અરજી અંગેનું માસિક પત્રક : સુરત જિલ્લો</h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="2">કક્ષા</th>
                            <th rowspan="2">માસનું નામ</th>
                            <th rowspan="2">માસની શરૂઆતમાં પડતર આરટીઆઇ અરજી</th>
                            <th rowspan="2">માસ દરમિયાન મળેલ અરજીઓ</th>
                            <th rowspan="2">કુલ</th>
                            <th colspan="2">તબદીલ</th>
                            <th colspan="3">નિકાલ કરેલ અરજીઓ</th>
                            <th colspan="2">નિકાલ પૈકી</th>
                            <th colspan="3">માસના અંતે પડતર</th>
                            <th rowspan="2">વિશેષ નોંધ</th>
                        </tr>

                        <tr align="center">
                            <th>અંશત તબદીલ</th>
                            <th>સંપૂર્ણ તબદીલ</th>
                            <th>મંજૂર</th>
                            <th>નામંજૂર</th>
                            <th>કુલ</th>
                            <th>સમય મર્યાદા અંદર</th>
                            <th>સમય મર્યાદા બહાર</th>
                            <th>સમય મર્યાદા અંદર</th>
                            <th>સમય મર્યાદા બહાર</th>
                            <th>કુલ બાકી અરજીઓ</th>
                        </tr>
                        
                        
                        <tbody align="center">
                            <tr align="center">

                                {{-- Check for patark is filled or not --}}
                                @if ($status == 1)
                                    
                                    <input id="sr_no" type="hidden" class="form-control @error('sr_no') is-invalid @enderror" name="sr_no" value="{{ $counter++; }}" autocomplete="sr_no"  style="width: 8rem; text-align: center;">

                                    @error('sr_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <td>{{ $designation->designation_name }}</td>
                                    <td>
                                        <input id="month_name" type="text" class="form-control @error('month_name') is-invalid @enderror" name="month_name" value="{{ $month_name }}" autocomplete="month_name"  style="width: 8rem; text-align: center;">

                                        @error('month_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_at_beginning_of_month" type="text" class="form-control @error('application_pending_at_beginning_of_month') is-invalid @enderror" name="application_pending_at_beginning_of_month" value="{{ $old_data->application_pending_at_beginning_of_month}}" autocomplete="application_pending_at_beginning_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_at_beginning_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_received_during_month" type="text" class="form-control @error('application_received_during_month') is-invalid @enderror" name="application_received_during_month" value="{{ $old_data->application_received_during_month }}" autocomplete="application_received_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_received_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_and_receive_application" type="text" class="form-control @error('total_pending_and_receive_application') is-invalid @enderror" name="total_pending_and_receive_application" value="{{ $old_data->total_pending_and_receive_application }}" autocomplete="total_pending_and_receive_application" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_pending_and_receive_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="partially_transfered" type="text" class="form-control @error('partially_transfered') is-invalid @enderror" name="partially_transfered" value="{{ $old_data->partially_transfered }}" autocomplete="partially_transfered" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('partially_transfered')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="fully_transfered" type="text" class="form-control @error('fully_transfered') is-invalid @enderror" name="fully_transfered" value="{{ $old_data->fully_transfered }}" autocomplete="fully_transfered" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('fully_transfered')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="approved_disposed_application" type="text" class="form-control @error('approved_disposed_application') is-invalid @enderror" name="approved_disposed_application" value="{{ $old_data->approved_disposed_application }}" autocomplete="approved_disposed_application" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('approved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="unapproved_disposed_application" type="text" class="form-control @error('unapproved_disposed_application') is-invalid @enderror" name="unapproved_disposed_application" value="{{ $old_data->unapproved_disposed_application }}" autocomplete="unapproved_disposed_application" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('unapproved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_approved_and_unapproved_disposed_application" type="text" class="form-control @error('total_approved_and_unapproved_disposed_application') is-invalid @enderror" name="total_approved_and_unapproved_disposed_application" value="{{ $old_data->total_approved_and_unapproved_disposed_application }}" autocomplete="total_approved_and_unapproved_disposed_application" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_approved_and_unapproved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_within_deadline" type="text" class="form-control @error('disposed_within_deadline') is-invalid @enderror" name="disposed_within_deadline" value="{{ $old_data->disposed_within_deadline }}" autocomplete="disposed_within_deadline" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_within_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_after_deadline" type="text" class="form-control @error('disposed_after_deadline') is-invalid @enderror" name="disposed_after_deadline" value="{{ $old_data->disposed_after_deadline }}" autocomplete="disposed_after_deadline"  style="width: 8rem; text-align: center;" readonly onkeyup="calculation();">

                                        @error('disposed_after_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_within_time_limit_at_the_end_of_month" type="text" class="form-control @error('application_pending_within_time_limit_at_the_end_of_month') is-invalid @enderror" name="application_pending_within_time_limit_at_the_end_of_month" value="{{ $old_data->application_pending_within_time_limit_at_the_end_of_month }}" autocomplete="application_pending_within_time_limit_at_the_end_of_month"  style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_within_time_limit_at_the_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_out_of_time_limit_at_the_end_of_month" type="text" class="form-control @error('application_pending_out_of_time_limit_at_the_end_of_month') is-invalid @enderror" name="application_pending_out_of_time_limit_at_the_end_of_month" value="{{ $old_data->application_pending_out_of_time_limit_at_the_end_of_month }}" autocomplete="application_pending_out_of_time_limit_at_the_end_of_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_out_of_time_limit_at_the_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_application" type="text" class="form-control @error('total_pending_application') is-invalid @enderror" name="total_pending_application" value="{{ $old_data->total_pending_application }}" autocomplete="total_pending_application" readonly style="width: 8rem; text-align: center;">

                                        @error('total_pending_application')
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
                                    
                                    <input id="sr_no" type="hidden" class="form-control @error('sr_no') is-invalid @enderror" name="sr_no" value="{{ $counter++; }}" autocomplete="sr_no"  style="width: 8rem; text-align: center;">

                                    @error('sr_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <td>{{ $designation->designation_name }}</td>
                                    <td>
                                        <input id="month_name" type="text" class="form-control @error('month_name') is-invalid @enderror" name="month_name" value="{{ $month_name }}" autocomplete="month_name"  style="width: 8rem; text-align: center;">

                                        @error('month_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_at_beginning_of_month" type="text" class="form-control @error('application_pending_at_beginning_of_month') is-invalid @enderror" name="application_pending_at_beginning_of_month" value="{{ old('application_pending_at_beginning_of_month') }}" autocomplete="application_pending_at_beginning_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_at_beginning_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_received_during_month" type="text" class="form-control @error('application_received_during_month') is-invalid @enderror" name="application_received_during_month" value="{{ old('application_received_during_month') }}" autocomplete="application_received_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_received_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_and_receive_application" type="text" class="form-control @error('total_pending_and_receive_application') is-invalid @enderror" name="total_pending_and_receive_application" value="{{ old('total_pending_and_receive_application') }}" readonly autocomplete="total_pending_and_receive_application"  style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_pending_and_receive_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="partially_transfered" type="text" class="form-control @error('partially_transfered') is-invalid @enderror" name="partially_transfered" value="{{ old('partially_transfered') }}" autocomplete="partially_transfered" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('partially_transfered')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="fully_transfered" type="text" class="form-control @error('fully_transfered') is-invalid @enderror" name="fully_transfered" value="{{ old('fully_transfered') }}" autocomplete="fully_transfered" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('fully_transfered')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="approved_disposed_application" type="text" class="form-control @error('approved_disposed_application') is-invalid @enderror" name="approved_disposed_application" value="{{ old('approved_disposed_application') }}" autocomplete="approved_disposed_application" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('approved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="unapproved_disposed_application" type="text" class="form-control @error('unapproved_disposed_application') is-invalid @enderror" name="unapproved_disposed_application" value="{{ old('unapproved_disposed_application') }}" autocomplete="unapproved_disposed_application" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('unapproved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_approved_and_unapproved_disposed_application" type="text" class="form-control @error('total_approved_and_unapproved_disposed_application') is-invalid @enderror" name="total_approved_and_unapproved_disposed_application" value="{{ old('total_approved_and_unapproved_disposed_application') }}" autocomplete="total_approved_and_unapproved_disposed_application" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_approved_and_unapproved_disposed_application')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_within_deadline" type="text" class="form-control @error('disposed_within_deadline') is-invalid @enderror" name="disposed_within_deadline" value="{{ old('disposed_within_deadline') }}" autocomplete="disposed_within_deadline" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_within_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_after_deadline" type="text" class="form-control @error('disposed_after_deadline') is-invalid @enderror" name="disposed_after_deadline" value="{{ old('disposed_after_deadline') }}" autocomplete="disposed_after_deadline" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_after_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_within_time_limit_at_the_end_of_month" type="text" class="form-control @error('application_pending_within_time_limit_at_the_end_of_month') is-invalid @enderror" name="application_pending_within_time_limit_at_the_end_of_month" value="{{ old('application_pending_within_time_limit_at_the_end_of_month') }}" autocomplete="application_pending_within_time_limit_at_the_end_of_month"  style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_within_time_limit_at_the_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="application_pending_out_of_time_limit_at_the_end_of_month" type="text" class="form-control @error('application_pending_out_of_time_limit_at_the_end_of_month') is-invalid @enderror" name="application_pending_out_of_time_limit_at_the_end_of_month" value="{{ old('application_pending_out_of_time_limit_at_the_end_of_month') }}" autocomplete="application_pending_out_of_time_limit_at_the_end_of_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('application_pending_out_of_time_limit_at_the_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_application" type="text" class="form-control @error('total_pending_application') is-invalid @enderror" name="total_pending_application" value="{{ old('total_pending_application') }}" autocomplete="total_pending_application" readonly style="width: 8rem; text-align: center;">

                                        @error('total_pending_application')
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

                var txtFirstNumberValue = document.getElementById('application_pending_at_beginning_of_month').value;
                var txtSecondNumberValue = document.getElementById('application_received_during_month').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_pending_and_receive_application').value = result;
                }

                
                var txt1NumberValue = document.getElementById('partially_transfered').value;
                var txt2NumberValue = document.getElementById('fully_transfered').value;
                var txt3NumberValue = document.getElementById('approved_disposed_application').value;
                var txt4NumberValue = document.getElementById('unapproved_disposed_application').value;
                if (txt1NumberValue == "")
                    txt1NumberValue = 0;
                if (txt2NumberValue == "")
                    txt2NumberValue = 0;
                if (txt3NumberValue == "")
                    txt3NumberValue = 0;
                if (txt4NumberValue == "")
                    txt4NumberValue = 0;

                var result1 = parseInt(txt1NumberValue) + parseInt(txt2NumberValue) + parseInt(txt3NumberValue) + parseInt(txt4NumberValue);
                if (!isNaN(result1)) {
                    document.getElementById('total_approved_and_unapproved_disposed_application').value = result1;
                }


                var txtFirstNumberVal = document.getElementById('total_approved_and_unapproved_disposed_application').value;
                var txtSecondNumberVal = document.getElementById('disposed_within_deadline').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;
               
                var result2 = parseInt(txtFirstNumberVal) - parseInt(txtSecondNumberVal);
                if (!isNaN(result2)) {
                    document.getElementById('disposed_after_deadline').value = result2;
                }

        
                var txtFirstNumValue = document.getElementById('total_pending_and_receive_application').value;
                var txtSecondNumValue = document.getElementById('total_approved_and_unapproved_disposed_application').value;
                var txtThirdNumValue = document.getElementById('application_pending_within_time_limit_at_the_end_of_month').value;
                if (txtFirstNumValue == "")
                    txtFirstNumValue = 0;
                if (txtSecondNumValue == "")
                    txtSecondNumValue = 0;
                if (txtThirdNumValue == "")
                    txtThirdNumValue = 0;

                var result3 = parseInt(txtFirstNumValue) - parseInt(txtSecondNumValue) - parseInt(txtThirdNumValue);
                if (!isNaN(result3)) {
                    document.getElementById('application_pending_out_of_time_limit_at_the_end_of_month').value = result3;
                }
                
                
                var txtFirstNumberVal = document.getElementById('application_pending_within_time_limit_at_the_end_of_month').value;
                var txtSecondNumberVal = document.getElementById('application_pending_out_of_time_limit_at_the_end_of_month').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;
               
                var result4 = parseInt(txtFirstNumberVal) + parseInt(txtSecondNumberVal);
                if (!isNaN(result4)) {
                    document.getElementById('total_pending_application').value = result4;
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