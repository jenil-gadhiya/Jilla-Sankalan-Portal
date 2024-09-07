<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.pending_recovery') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">પત્રક-6 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : સરકારી બાકી વસૂલાતની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો												
                </h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
                        <tr align="center">
                            <th rowspan="3">કક્ષા</th>
                            <th rowspan="3">માસનું નામ</th>
                            <th rowspan="3">પાછલી બાકી રૂપિયા લાખમાં</th>
                            <th rowspan="3">ચાલુ વર્ષનું નવું માંગણું રૂ. લાખમાં</th>
                            <th rowspan="3">કુલ બાકી વસૂલાત રૂપિયા લાખમાં</th>
                            <th rowspan="3">ગત માસ સુધીની વસૂલાત રૂ. લાખમાં</th>
                            <th rowspan="3">ચાલુ માસની વસૂલાત રૂ. લાખમાં</th>
                            <th rowspan="3">વર્ષ દરમ્યાન કુલ વસૂલાત રૂ. લાખમાં</th>                           
                            <th colspan="4">માસ આખરે બાકી વસૂલાત રૂ. લાખમાં</th>
                            <th rowspan="3">રિમાર્ક્સ</th>
                        </tr>
                        <tr align="center">
                            <th rowspan="2">વસૂલ થઈ શકે તેવી બાકી રકમ</th>
                            <th rowspan="2">લીટીગેશન વાળી</th>
                            <th rowspan="2">વસૂલ ન થઈ શકે તેવી</th>
                            <th rowspan="2">કુલ બાકી</th>
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
                                        <input id="recovery_left" type="text" class="form-control @error('recovery_left') is-invalid @enderror" name="recovery_left" value="{{ $old_data->recovery_left}}" autocomplete="recovery_left" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('recovery_left')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="current_year_borrowed" type="text" class="form-control @error('current_year_borrowed') is-invalid @enderror" name="current_year_borrowed" value="{{ $old_data->current_year_borrowed }}" autocomplete="current_year_borrowed" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('current_year_borrowed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovery_left" type="text" class="form-control @error('total_recovery_left') is-invalid @enderror" name="total_recovery_left" value="{{ $old_data->total_recovery_left }}" autocomplete="total_recovery_left" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_recovery_left')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="recovey_upto_last_month" type="text" class="form-control @error('recovey_upto_last_month') is-invalid @enderror" name="recovey_upto_last_month" value="{{ $old_data->recovey_upto_last_month }}" autocomplete="recovey_upto_last_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('recovey_upto_last_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="current_month_recovery" type="text" class="form-control @error('current_month_recovery') is-invalid @enderror" name="current_month_recovery" value="{{ $old_data->current_month_recovery }}" autocomplete="current_month_recovery" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('current_month_recovery')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovey_during_year" type="text" class="form-control @error('total_recovey_during_year') is-invalid @enderror" name="total_recovey_during_year" value="{{ $old_data->total_recovey_during_year }}" autocomplete="total_recovey_during_year" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_recovey_during_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_recoverable_amount_after_each_month" type="text" class="form-control @error('pending_recoverable_amount_after_each_month') is-invalid @enderror" name="pending_recoverable_amount_after_each_month" value="{{ $old_data->pending_recoverable_amount_after_each_month }}" autocomplete="pending_recoverable_amount_after_each_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_recoverable_amount_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_litigation_after_each_month" type="text" class="form-control @error('pending_litigation_after_each_month') is-invalid @enderror" name="pending_litigation_after_each_month" value="{{ $old_data->pending_litigation_after_each_month }}" autocomplete="pending_litigation_after_each_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_litigation_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_unrecoverable_amount_after_each_month" type="text" class="form-control @error('pending_unrecoverable_amount_after_each_month') is-invalid @enderror" name="pending_unrecoverable_amount_after_each_month" value="{{ $old_data->pending_unrecoverable_amount_after_each_month }}" autocomplete="pending_unrecoverable_amount_after_each_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_unrecoverable_amount_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovery_left_after_each_month" type="text" class="form-control @error('total_recovery_left_after_each_month') is-invalid @enderror" name="total_recovery_left_after_each_month" value="{{ $old_data->total_recovery_left_after_each_month }}" autocomplete="total_recovery_left_after_each_month" readonly style="width: 8rem; text-align: center;" >

                                        @error('total_recovery_left_after_each_month')
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
                                        <input id="recovery_left" type="text" class="form-control @error('recovery_left') is-invalid @enderror" name="recovery_left" value="{{ old('recovery_left') }}" autocomplete="recovery_left" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('recovery_left')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="current_year_borrowed" type="text" class="form-control @error('current_year_borrowed') is-invalid @enderror" name="current_year_borrowed" value="{{ old('current_year_borrowed') }}" autocomplete="current_year_borrowed" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('current_year_borrowed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovery_left" type="text" class="form-control @error('total_recovery_left') is-invalid @enderror" name="total_recovery_left" value="{{ old('total_recovery_left') }}" autocomplete="total_recovery_left" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_recovery_left')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="recovey_upto_last_month" type="text" class="form-control @error('recovey_upto_last_month') is-invalid @enderror" name="recovey_upto_last_month" value="{{ old('recovey_upto_last_month') }}" autocomplete="recovey_upto_last_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('recovey_upto_last_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="current_month_recovery" type="text" class="form-control @error('current_month_recovery') is-invalid @enderror" name="current_month_recovery" value="{{ old('current_month_recovery') }}" autocomplete="current_month_recovery" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('current_month_recovery')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovey_during_year" type="text" class="form-control @error('total_recovey_during_year') is-invalid @enderror" name="total_recovey_during_year" value="{{ old('total_recovey_during_year') }}" autocomplete="total_recovey_during_year" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_recovey_during_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_recoverable_amount_after_each_month" type="text" class="form-control @error('pending_recoverable_amount_after_each_month') is-invalid @enderror" name="pending_recoverable_amount_after_each_month" value="{{ old('pending_recoverable_amount_after_each_month') }}" autocomplete="pending_recoverable_amount_after_each_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_recoverable_amount_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_litigation_after_each_month" type="text" class="form-control @error('pending_litigation_after_each_month') is-invalid @enderror" name="pending_litigation_after_each_month" value="{{ old('pending_litigation_after_each_month') }}" autocomplete="pending_litigation_after_each_month" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_litigation_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_unrecoverable_amount_after_each_month" type="text" class="form-control @error('pending_unrecoverable_amount_after_each_month') is-invalid @enderror" name="pending_unrecoverable_amount_after_each_month" value="{{ old('pending_unrecoverable_amount_after_each_month') }}" autocomplete="pending_unrecoverable_amount_after_each_month" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('pending_unrecoverable_amount_after_each_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_recovery_left_after_each_month" type="text" class="form-control @error('total_recovery_left_after_each_month') is-invalid @enderror" name="total_recovery_left_after_each_month" value="{{ old('total_recovery_left_after_each_month') }}" autocomplete="total_recovery_left_after_each_month" readonly style="width: 8rem; text-align: center;">

                                        @error('total_recovery_left_after_each_month')
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

                var txtFirstNumberValue = document.getElementById('recovery_left').value;
                var txtSecondNumberValue = document.getElementById('current_year_borrowed').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_recovery_left').value = result;
                }

                
                var txt1NumberValue = document.getElementById('recovey_upto_last_month').value;
                var txt2NumberValue = document.getElementById('current_month_recovery').value;        
                if (txt1NumberValue == "")
                    txt1NumberValue = 0;
                if (txt2NumberValue == "")
                    txt2NumberValue = 0;

                var result1 = parseInt(txt1NumberValue) + parseInt(txt2NumberValue);
                if (!isNaN(result1)) {
                    document.getElementById('total_recovey_during_year').value = result1;
                }
            

                var txtFirstNumberVal = document.getElementById('total_recovery_left').value;
                var txtSecondNumberVal = document.getElementById('total_recovey_during_year').value;
                var txtThirdNumberVal = document.getElementById('pending_recoverable_amount_after_each_month').value;
                var txtForthNumberVal = document.getElementById('pending_litigation_after_each_month').value;
                if (txtFirstNumberVal == "")
                    txtFirstNumberVal = 0;
                if (txtSecondNumberVal == "")
                    txtSecondNumberVal = 0;
                if (txtThirdNumberVal == "")
                    txtThirdNumberVal = 0;
                if (txtForthNumberVal == "")
                    txtForthNumberVal = 0;
            
                var result2 = parseInt(txtFirstNumberVal) - parseInt(txtSecondNumberVal) - (parseInt(txtThirdNumberVal) + parseInt(txtForthNumberVal));
                if (!isNaN(result2)) {
                    document.getElementById('pending_unrecoverable_amount_after_each_month').value = result2;
                }

                var txtFirstNumValue = document.getElementById('pending_recoverable_amount_after_each_month').value;
                var txtSecondNumValue = document.getElementById('pending_litigation_after_each_month').value;
                var txtThirdNumValue = document.getElementById('pending_unrecoverable_amount_after_each_month').value;
                if (txtFirstNumValue == "")
                    txtFirstNumValue = 0;
                if (txtSecondNumValue == "")
                    txtSecondNumValue = 0;
                if (txtThirdNumValue == "")
                    txtThirdNumValue = 0;

                var result3 = parseInt(txtFirstNumValue) + parseInt(txtSecondNumValue) + parseInt(txtThirdNumValue);
                if (!isNaN(result3)) {
                    document.getElementById('total_recovery_left_after_each_month').value = result3;
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