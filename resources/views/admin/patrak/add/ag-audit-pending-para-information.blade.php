<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.ag_audit') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">પત્રક-4 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : એ. જી. ઓડીટ બાકી પેરાની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો						
                </h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="3">કક્ષા</th>
                            <th rowspan="3">માસનું નામ</th>
                            <th rowspan="3">છેવટના બાકી પેરા</th>
                            <th rowspan="3">માસ દરમ્યાન નવા મળેલ પેરા</th>
                            <th rowspan="3">કુલ પેરા</th>
                            <th colspan="2">માસ દરમ્યાન નિકાલ	</th>
                            <th rowspan="3">માસના અંતે નિકાલ કરેલ કેસો</th>
                            <th colspan="2">માસ અંતે બાકી પેરા</th>
                            <th rowspan="3">રિમાર્ક્સ</th>
                          </tr>

                        <tr align="center">
                            <th rowspan="2">માસ દરમ્યાન પુર્તતા કરેલ પેરા</th>
                            <th rowspan="2">ગ્રાહ્ય થયેલ પેરા</th>                            
                            <th rowspan="2">પુર્તતા કરવા પર બાકી</th>                            
                            <th rowspan="2">ગ્રાહ્ય કરવા પર બાકી</th>                            
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
                                        <input id="final_pending_para" type="text" class="form-control @error('final_pending_para') is-invalid @enderror" name="final_pending_para" value="{{ $old_data->final_pending_para}}" autocomplete="final_pending_para" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('final_pending_para')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_received_para_during_month" type="text" class="form-control @error('new_received_para_during_month') is-invalid @enderror" name="new_received_para_during_month" value="{{ $old_data->new_received_para_during_month }}" autocomplete="new_received_para_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_received_para_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_para" type="text" class="form-control @error('total_para') is-invalid @enderror" name="total_para" value="{{ $old_data->total_para }}" autocomplete="total_para" readonly style="width: 8rem; text-align: center;">

                                        @error('total_para')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposal_of_para_execution_during_month" type="text" class="form-control @error('disposal_of_para_execution_during_month') is-invalid @enderror" name="disposal_of_para_execution_during_month" value="{{ $old_data->disposal_of_para_execution_during_month }}" autocomplete="disposal_of_para_execution_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();" >

                                        @error('disposal_of_para_execution_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposal_of_para_receiving_during_month" type="text" class="form-control @error('disposal_of_para_receiving_during_month') is-invalid @enderror" name="disposal_of_para_receiving_during_month" value="{{ $old_data->disposal_of_para_receiving_during_month }}" autocomplete="disposal_of_para_receiving_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();" >

                                        @error('disposal_of_para_receiving_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_cases_at_end_of_month" type="text" class="form-control @error('disposed_cases_at_end_of_month') is-invalid @enderror" name="disposed_cases_at_end_of_month" value="{{ $old_data->disposed_cases_at_end_of_month }}" autocomplete="disposed_cases_at_end_of_month" readonly style="width: 8rem; text-align: center;"  >

                                        @error('disposed_cases_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_execution_of_para_at_end_of_month" type="text" class="form-control @error('pending_execution_of_para_at_end_of_month') is-invalid @enderror" name="pending_execution_of_para_at_end_of_month" value="{{ $old_data->pending_execution_of_para_at_end_of_month }}" autocomplete="pending_execution_of_para_at_end_of_month" style="width: 8rem; text-align: center;"  >

                                        @error('pending_execution_of_para_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_to_receive_para_at_end_of_month" type="text" class="form-control @error('pending_to_receive_para_at_end_of_month') is-invalid @enderror" name="pending_to_receive_para_at_end_of_month" value="{{ $old_data->pending_to_receive_para_at_end_of_month }}" autocomplete="pending_to_receive_para_at_end_of_month" style="width: 8rem; text-align: center;">

                                        @error('pending_to_receive_para_at_end_of_month')
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
                                        <input id="final_pending_para" type="text" class="form-control @error('final_pending_para') is-invalid @enderror" name="final_pending_para" value="{{ old('final_pending_para') }}" autocomplete="final_pending_para" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('final_pending_para')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_received_para_during_month" type="text" class="form-control @error('new_received_para_during_month') is-invalid @enderror" name="new_received_para_during_month" value="{{ old('new_received_para_during_month') }}" autocomplete="new_received_para_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_received_para_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_para" type="text" class="form-control @error('total_para') is-invalid @enderror" name="total_para" value="{{ old('total_para') }}" autocomplete="total_para" readonly style="width: 8rem; text-align: center;">

                                        @error('total_para')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposal_of_para_execution_during_month" type="text" class="form-control @error('disposal_of_para_execution_during_month') is-invalid @enderror" name="disposal_of_para_execution_during_month" value="{{ old('disposal_of_para_execution_during_month') }}" autocomplete="disposal_of_para_execution_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();" >

                                        @error('disposal_of_para_execution_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposal_of_para_receiving_during_month" type="text" class="form-control @error('disposal_of_para_receiving_during_month') is-invalid @enderror" name="disposal_of_para_receiving_during_month" value="{{ old('disposal_of_para_receiving_during_month') }}" autocomplete="disposal_of_para_receiving_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();" >

                                        @error('disposal_of_para_receiving_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_cases_at_end_of_month" type="text" class="form-control @error('disposed_cases_at_end_of_month') is-invalid @enderror" name="disposed_cases_at_end_of_month" value="{{ old('disposed_cases_at_end_of_month') }}" autocomplete="disposed_cases_at_end_of_month" readonly style="width: 8rem; text-align: center;">

                                        @error('disposed_cases_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_execution_of_para_at_end_of_month" type="text" class="form-control @error('pending_execution_of_para_at_end_of_month') is-invalid @enderror" name="pending_execution_of_para_at_end_of_month" value="{{ old('pending_execution_of_para_at_end_of_month') }}" autocomplete="pending_execution_of_para_at_end_of_month" style="width: 8rem; text-align: center;"  >

                                        @error('pending_execution_of_para_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_to_receive_para_at_end_of_month" type="text" class="form-control @error('pending_to_receive_para_at_end_of_month') is-invalid @enderror" name="pending_to_receive_para_at_end_of_month" value="{{ old('pending_to_receive_para_at_end_of_month') }}" autocomplete="pending_to_receive_para_at_end_of_month" style="width: 8rem; text-align: center;">

                                        @error('pending_to_receive_para_at_end_of_month')
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
                var txtFirstNumberValue = document.getElementById('final_pending_para').value;
                var txtSecondNumberValue = document.getElementById('new_received_para_during_month').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_para').value = result;
                }

                var txtFirstNumberVal = document.getElementById('disposal_of_para_execution_during_month').value;
                var txtSecondNumberVal = document.getElementById('disposal_of_para_receiving_during_month').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;

                var result1 = parseInt(txtFirstNumberVal) + parseInt(txtSecondNumberVal);
                if (!isNaN(result1)) {
                    document.getElementById('disposed_cases_at_end_of_month').value = result1;
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