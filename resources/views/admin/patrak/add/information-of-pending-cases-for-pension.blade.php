<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.pending_cases_pension') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">પત્રક-3 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : બાકી પેન્શન કેસોના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો							
                </h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="3">કક્ષા</th>
                            <th rowspan="3">માસનું નામ</th>
                            <th rowspan="3">માસની શરૂઆતમાં બાકી કેસો</th>
                            <th rowspan="3">માસ દરમ્યાન મળેલ કેસો</th>
                            <th rowspan="3">કુલ કેસો</th>
                            <th rowspan="3">માસના અંતે નિકાલ કરેલ કેસો</th>
                            <th colspan="5">માસ અંતે આખર બાકી રહેલ કેસો</th>
                            <th rowspan="3">રિમાર્ક્સ</th>
                        </tr>
                        <tr align="center">
                            <th rowspan="2">૧ માસ સુધી</th>
                            <th rowspan="2">૨ માસ સુધી</th>
                            <th rowspan="2">૩ માસ સુધી</th>
                            <th rowspan="2">૩ માસ ઉપર</th>
                            <th rowspan="2">કુલ બાકી કેસો</th>
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
                                        <input id="pending_cases_at_start_of_month" type="text" class="form-control @error('pending_cases_at_start_of_month') is-invalid @enderror" name="pending_cases_at_start_of_month" value="{{ $old_data->pending_cases_at_start_of_month}}" autocomplete="pending_cases_at_start_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_at_start_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="cases_during_month" type="text" class="form-control @error('cases_during_month') is-invalid @enderror" name="cases_during_month" value="{{ $old_data->cases_during_month }}" autocomplete="cases_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('cases_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_cases" type="text" class="form-control @error('total_cases') is-invalid @enderror" name="total_cases" value="{{ $old_data->total_cases }}" autocomplete="total_cases" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_cases')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_cases_at_end_of_month" type="text" class="form-control @error('disposed_cases_at_end_of_month') is-invalid @enderror" name="disposed_cases_at_end_of_month" value="{{ $old_data->disposed_cases_at_end_of_month }}" autocomplete="disposed_cases_at_end_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_cases_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_one_month" type="text" class="form-control @error('pending_cases_after_one_month') is-invalid @enderror" name="pending_cases_after_one_month" value="{{ $old_data->pending_cases_after_one_month }}" autocomplete="pending_cases_after_one_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_one_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_two_month" type="text" class="form-control @error('pending_cases_after_two_month') is-invalid @enderror" name="pending_cases_after_two_month" value="{{ $old_data->pending_cases_after_two_month }}" autocomplete="pending_cases_after_two_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_two_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_three_month" type="text" class="form-control @error('pending_cases_after_three_month') is-invalid @enderror" name="pending_cases_after_three_month" value="{{ $old_data->pending_cases_after_three_month }}" autocomplete="pending_cases_after_three_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_three_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_above_three_month" type="text" class="form-control @error('pending_cases_above_three_month') is-invalid @enderror" name="pending_cases_above_three_month" value="{{ $old_data->pending_cases_above_three_month }}" autocomplete="pending_cases_above_three_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_above_three_month')
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
                                        <input id="pending_cases_at_start_of_month" type="text" class="form-control @error('pending_cases_at_start_of_month') is-invalid @enderror" name="pending_cases_at_start_of_month" value="{{ old('pending_cases_at_start_of_month') }}" autocomplete="pending_cases_at_start_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_at_start_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="cases_during_month" type="text" class="form-control @error('cases_during_month') is-invalid @enderror" name="cases_during_month" value="{{ old('cases_during_month') }}" autocomplete="cases_during_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('cases_during_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_cases" type="text" class="form-control @error('total_cases') is-invalid @enderror" name="total_cases" value="{{ old('total_cases') }}" autocomplete="total_cases" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_cases')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_cases_at_end_of_month" type="text" class="form-control @error('disposed_cases_at_end_of_month') is-invalid @enderror" name="disposed_cases_at_end_of_month" value="{{ old('disposed_cases_at_end_of_month') }}" autocomplete="disposed_cases_at_end_of_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_cases_at_end_of_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_one_month" type="text" class="form-control @error('pending_cases_after_one_month') is-invalid @enderror" name="pending_cases_after_one_month" value="{{ old('pending_cases_after_one_month') }}" autocomplete="pending_cases_after_one_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_one_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_two_month" type="text" class="form-control @error('pending_cases_after_two_month') is-invalid @enderror" name="pending_cases_after_two_month" value="{{ old('pending_cases_after_two_month') }}" autocomplete="pending_cases_after_two_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_two_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_after_three_month" type="text" class="form-control @error('pending_cases_after_three_month') is-invalid @enderror" name="pending_cases_after_three_month" value="{{ old('pending_cases_after_three_month') }}" autocomplete="pending_cases_after_three_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_after_three_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_cases_above_three_month" type="text" class="form-control @error('pending_cases_above_three_month') is-invalid @enderror" name="pending_cases_above_three_month" value="{{ old('pending_cases_above_three_month') }}" autocomplete="pending_cases_above_three_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_cases_above_three_month')
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
                var txtFirstNumberValue = document.getElementById('pending_cases_at_start_of_month').value;
                var txtSecondNumberValue = document.getElementById('cases_during_month').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_cases').value = result;
                }

                var txtFirstNumValue = document.getElementById('total_cases').value;
                var txtSecondNumValue = document.getElementById('disposed_cases_at_end_of_month').value;
                var txtThirdNumValue = document.getElementById('pending_cases_after_one_month').value;
                var txtForthNumValue = document.getElementById('pending_cases_after_two_month').value;
                var txtFifthNumValue = document.getElementById('pending_cases_after_three_month').value;
                
                if (txtFirstNumValue == "")
                    txtFirstNumValue = 0;
                if (txtSecondNumValue == "")
                    txtSecondNumValue = 0;
                if (txtThirdNumValue == "")
                    txtThirdNumValue = 0;
                if (txtForthNumValue == "")
                    txtForthNumValue = 0;
                if (txtFifthNumValue == "")
                    txtFifthNumValue = 0;

                var result2 = parseInt(txtFirstNumValue) - parseInt(txtSecondNumValue) - (parseInt(txtThirdNumValue) + parseInt(txtForthNumValue) + parseInt(txtFifthNumValue));
                if (!isNaN(result2)) {
                    document.getElementById('pending_cases_above_three_month').value = result2;
                }


                var txtFirstNumberVal = document.getElementById('pending_cases_after_one_month').value;
                var txtSecondNumberVal = document.getElementById('pending_cases_after_two_month').value;
                var txtThirdNumberVal = document.getElementById('pending_cases_after_three_month').value;
                var txtForthNumberVal = document.getElementById('pending_cases_above_three_month').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;
                if (txtThirdNumberVal == "")
                    txtThirdNumberVal = 0;
                if (txtForthNumberVal == "")
                    txtForthNumberVal = 0;

                var result1 = parseInt(txtFirstNumberVal) + parseInt(txtSecondNumberVal) + parseInt(txtThirdNumberVal) + parseInt(txtForthNumberVal);
                if (!isNaN(result)) {
                    document.getElementById('total_pending_cases').value = result1;
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