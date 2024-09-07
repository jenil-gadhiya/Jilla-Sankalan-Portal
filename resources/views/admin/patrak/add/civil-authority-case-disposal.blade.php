<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.civil') }}">
        @csrf
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">નાગરિક અધિકાર (ખરડા) અન્વયે મળેલ અરજીઓના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</h6>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="3">કક્ષા</th>
                            <th rowspan="3">માસનું નામ</th>
                            <th rowspan="3">અગાઉના માસ અંતે પડતર અરજીઓ</th>
                            <th rowspan="3">માસ દરમિયાન મળેલ અરજીઓ</th>
                            <th rowspan="3">કુલ</th>
                            <th colspan="5">નિકાલ</th>
                            <th colspan="2">બાકી</th>
                            <th rowspan="3">કુલ બાકી ( 5-10) અને 11+12</th>
                            <th rowspan="3">વિશેષ નોંધ</th>
                        </tr>

                        <tr align="center">
                            <th colspan="2">સમય મર્યાદામાં</th>
                            <th colspan="2">સમય મર્યાદા બાદ</th>
                            <th rowspan="2">કુલ નિકાલ</th>
                            <th rowspan="2">સમય મર્યાદાવાળી</th>
                            <th rowspan="2">સમય મર્યાદા બાદની</th>
                        </tr>

                        <tr align="center">
                            <th>હકરાત્મક</th>
                            <th>નકારાત્મક</th>
                            <th>હકરાત્મક</th>
                            <th>નકારાત્મક</th>  
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
                                        <input id="previous_month_pending_case" type="text" class="form-control @error('previous_month_pending_case') is-invalid @enderror" name="previous_month_pending_case" value="{{ $old_data->previous_month_pending_case}}" autocomplete="previous_month_pending_case" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('previous_month_pending_case')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="cases_of_current_month" type="text" class="form-control @error('cases_of_current_month') is-invalid @enderror" name="cases_of_current_month" value="{{ $old_data->cases_of_current_month }}" autocomplete="cases_of_current_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('cases_of_current_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_of_previous_month_pending_case_and_cases_of_current_month" type="text" class="form-control @error('total_of_previous_month_pending_case_and_cases_of_current_month') is-invalid @enderror" name="total_of_previous_month_pending_case_and_cases_of_current_month" value="{{ $old_data->total_of_previous_month_pending_case_and_cases_of_current_month }}" autocomplete="total_of_previous_month_pending_case_and_cases_of_current_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_of_previous_month_pending_case_and_cases_of_current_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_within_deadline_positive" type="text" class="form-control @error('dispose_within_deadline_positive') is-invalid @enderror" name="dispose_within_deadline_positive" value="{{ $old_data->dispose_within_deadline_positive }}" autocomplete="dispose_within_deadline_positive" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_within_deadline_positive')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_within_deadline_negative" type="text" class="form-control @error('dispose_within_deadline_negative') is-invalid @enderror" name="dispose_within_deadline_negative" value="{{ $old_data->dispose_within_deadline_negative }}" autocomplete="dispose_within_deadline_negative" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_within_deadline_negative')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_after_deadline_positive" type="text" class="form-control @error('dispose_after_deadline_positive') is-invalid @enderror" name="dispose_after_deadline_positive" value="{{ $old_data->dispose_after_deadline_positive }}" autocomplete="dispose_after_deadline_positive" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_after_deadline_positive')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_after_deadline_negative" type="text" class="form-control @error('dispose_after_deadline_negative') is-invalid @enderror" name="dispose_after_deadline_negative" value="{{ $old_data->dispose_after_deadline_negative }}" autocomplete="dispose_after_deadline_negative" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_after_deadline_negative')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_dispose" type="text" class="form-control @error('total_dispose') is-invalid @enderror" name="total_dispose" value="{{ $old_data->total_dispose }}" autocomplete="total_dispose" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_dispose')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="case_pending_within_deadline" type="text" class="form-control @error('case_pending_within_deadline') is-invalid @enderror" name="case_pending_within_deadline" value="{{ $old_data->case_pending_within_deadline }}" autocomplete="case_pending_within_deadline" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('case_pending_within_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="case_pending_after_deadline" type="text" class="form-control @error('case_pending_after_deadline') is-invalid @enderror" name="case_pending_after_deadline" value="{{ $old_data->case_pending_after_deadline }}" autocomplete="case_pending_after_deadline" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('case_pending_after_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_cases" type="text" class="form-control @error('total_pending_cases') is-invalid @enderror" name="total_pending_cases" value="{{ $old_data->total_pending_cases }}" autocomplete="total_pending_cases" readonly style="width: 8rem; text-align: center;">

                                        @error('total_pending_cases')
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
                                        <input id="previous_month_pending_case" type="text" class="form-control @error('previous_month_pending_case') is-invalid @enderror" name="previous_month_pending_case" value="{{ old('previous_month_pending_case') }}" autocomplete="previous_month_pending_case" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('previous_month_pending_case')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="cases_of_current_month" type="text" class="form-control @error('cases_of_current_month') is-invalid @enderror" name="cases_of_current_month" value="{{ old('cases_of_current_month') }}" autocomplete="cases_of_current_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('cases_of_current_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_of_previous_month_pending_case_and_cases_of_current_month" type="text" class="form-control @error('total_of_previous_month_pending_case_and_cases_of_current_month') is-invalid @enderror" name="total_of_previous_month_pending_case_and_cases_of_current_month" value="{{ old('total_of_previous_month_pending_case_and_cases_of_current_month') }}" autocomplete="total_of_previous_month_pending_case_and_cases_of_current_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_of_previous_month_pending_case_and_cases_of_current_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_within_deadline_positive" type="text" class="form-control @error('dispose_within_deadline_positive') is-invalid @enderror" name="dispose_within_deadline_positive" value="{{ old('dispose_within_deadline_positive') }}" autocomplete="dispose_within_deadline_positive" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_within_deadline_positive')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_within_deadline_negative" type="text" class="form-control @error('dispose_within_deadline_negative') is-invalid @enderror" name="dispose_within_deadline_negative" value="{{ old('dispose_within_deadline_negative') }}" autocomplete="dispose_within_deadline_negative" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_within_deadline_negative')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_after_deadline_positive" type="text" class="form-control @error('dispose_after_deadline_positive') is-invalid @enderror" name="dispose_after_deadline_positive" value="{{ old('dispose_after_deadline_positive') }}" autocomplete="dispose_after_deadline_positive" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_after_deadline_positive')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="dispose_after_deadline_negative" type="text" class="form-control @error('dispose_after_deadline_negative') is-invalid @enderror" name="dispose_after_deadline_negative" value="{{ old('dispose_after_deadline_negative') }}" autocomplete="dispose_after_deadline_negative" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('dispose_after_deadline_negative')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_dispose" type="text" class="form-control @error('total_dispose') is-invalid @enderror" name="total_dispose" value="{{ old('total_dispose') }}" autocomplete="total_dispose" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_dispose')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="case_pending_within_deadline" type="text" class="form-control @error('case_pending_within_deadline') is-invalid @enderror" name="case_pending_within_deadline" value="{{ old('case_pending_within_deadline') }}" autocomplete="case_pending_within_deadline" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('case_pending_within_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="case_pending_after_deadline" type="text" class="form-control @error('case_pending_after_deadline') is-invalid @enderror" name="case_pending_after_deadline" value="{{ old('case_pending_after_deadline') }}" autocomplete="case_pending_after_deadline" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('case_pending_after_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_pending_cases" type="text" class="form-control @error('total_pending_cases') is-invalid @enderror" name="total_pending_cases" value="{{ old('total_pending_cases') }}" autocomplete="total_pending_cases" readonly style="width: 8rem; text-align: center;">

                                        @error('total_pending_cases')
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

                var txtFirstNumberValue = document.getElementById('previous_month_pending_case').value;
                var txtSecondNumberValue = document.getElementById('cases_of_current_month').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_of_previous_month_pending_case_and_cases_of_current_month').value = result;
                }

                
                var txt1NumberValue = document.getElementById('dispose_within_deadline_positive').value;
                var txt2NumberValue = document.getElementById('dispose_within_deadline_negative').value;
                var txt3NumberValue = document.getElementById('dispose_after_deadline_positive').value;
                var txt4NumberValue = document.getElementById('dispose_after_deadline_negative').value;
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
                    document.getElementById('total_dispose').value = result1;
                }


                var txtFirstNumberVal = document.getElementById('total_of_previous_month_pending_case_and_cases_of_current_month').value;
                var txtSecondNumberVal = document.getElementById('total_dispose').value;
                var txtThirdNumberVal = document.getElementById('case_pending_within_deadline').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;
                if (txtThirdNumberVal == "")
                    txtThirdNumberVal = 0;
            
                var result2 = parseInt(txtFirstNumberVal) - parseInt(txtSecondNumberVal) - parseInt(txtThirdNumberVal);
                if (!isNaN(result2)) {
                    document.getElementById('case_pending_after_deadline').value = result2;
                }


                var txtFirstNumValue = document.getElementById('case_pending_within_deadline').value;
                var txtSecondNumValue = document.getElementById('case_pending_after_deadline').value;
                if (txtFirstNumValue == "")
                    txtFirstNumValue = 0;
                if (txtSecondNumValue == "")
                    txtSecondNumValue = 0;

                var result3 = parseInt(txtFirstNumValue) + parseInt(txtSecondNumValue);
                if (!isNaN(result3)) {
                    document.getElementById('total_pending_cases').value = result3;
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