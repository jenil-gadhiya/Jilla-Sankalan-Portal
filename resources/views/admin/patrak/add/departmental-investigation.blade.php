<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.depatmental_investigation') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">પત્રક-7 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : ખાતાકીય તપાસની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center" >
                            <th>કક્ષા</th>
                            <th>માસનું નામ</th>
                            <th>શરૂઆતમાં બાકી ખાતાકીય તપાસ</th>
                            <th>નવી મળેલ ખાતાકીય તપાસ</th>
                            <th>કુલ ખાતાકીય તપાસ</th>
                            <th>નિકાલ કરેલ ખાતાકીય તપાસ</th>
                            <th>આખરે બાકી ખાતાકીય તપાસ</th>
                            <th>રિમાર્ક્સ</th>
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
                                        <input id="initially_pending_departmental_investigation" type="text" class="form-control @error('initially_pending_departmental_investigation') is-invalid @enderror" name="initially_pending_departmental_investigation" value="{{ $old_data->initially_pending_departmental_investigation}}" autocomplete="initially_pending_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('initially_pending_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_departmental_investigation" type="text" class="form-control @error('new_departmental_investigation') is-invalid @enderror" name="new_departmental_investigation" value="{{ $old_data->new_departmental_investigation }}" autocomplete="new_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_departmental_investigation" type="text" class="form-control @error('total_departmental_investigation') is-invalid @enderror" name="total_departmental_investigation" value="{{ $old_data->total_departmental_investigation }}" autocomplete="total_departmental_investigation" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_departmental_investigation" type="text" class="form-control @error('disposed_departmental_investigation') is-invalid @enderror" name="disposed_departmental_investigation" value="{{ $old_data->disposed_departmental_investigation }}" autocomplete="disposed_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="final_pending_departmental_investigation" type="text" class="form-control @error('final_pending_departmental_investigation') is-invalid @enderror" name="final_pending_departmental_investigation" value="{{ $old_data->final_pending_departmental_investigation }}" autocomplete="final_pending_departmental_investigation" readonly style="width: 8rem; text-align: center;" >

                                        @error('final_pending_departmental_investigation')
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
                                        <input id="initially_pending_departmental_investigation" type="text" class="form-control @error('initially_pending_departmental_investigation') is-invalid @enderror" name="initially_pending_departmental_investigation" value="{{ old('initially_pending_departmental_investigation') }}" autocomplete="initially_pending_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('initially_pending_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="new_departmental_investigation" type="text" class="form-control @error('new_departmental_investigation') is-invalid @enderror" name="new_departmental_investigation" value="{{ old('new_departmental_investigation') }}" autocomplete="new_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('new_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="total_departmental_investigation" type="text" class="form-control @error('total_departmental_investigation') is-invalid @enderror" name="total_departmental_investigation" value="{{ old('total_departmental_investigation') }}" autocomplete="total_departmental_investigation" readonly style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('total_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed_departmental_investigation" type="text" class="form-control @error('disposed_departmental_investigation') is-invalid @enderror" name="disposed_departmental_investigation" value="{{ old('disposed_departmental_investigation') }}" autocomplete="disposed_departmental_investigation" style="width: 8rem; text-align: center;" onkeyup="calculation();">

                                        @error('disposed_departmental_investigation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="final_pending_departmental_investigation" type="text" class="form-control @error('final_pending_departmental_investigation') is-invalid @enderror" name="final_pending_departmental_investigation" value="{{ old('final_pending_departmental_investigation') }}" autocomplete="final_pending_departmental_investigation" readonly style="width: 8rem; text-align: center;" >

                                        @error('final_pending_departmental_investigation')
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

                var txtFirstNumberValue = document.getElementById('initially_pending_departmental_investigation').value;
                var txtSecondNumberValue = document.getElementById('new_departmental_investigation').value;
                if (txtFirstNumberValue == "")
                    txtFirstNumberValue = 0;
                if (txtSecondNumberValue == "")
                    txtSecondNumberValue = 0;

                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('total_departmental_investigation').value = result;
                }

                
                var txtFirstNumValue = document.getElementById('total_departmental_investigation').value;
                var txtSecondNumValue = document.getElementById('disposed_departmental_investigation').value;
                if (txtFirstNumValue == "")
                    txtFirstNumValue = 0;
                if (txtSecondNumValue == "")
                    txtSecondNumValue = 0;

                var result1 = parseInt(txtFirstNumValue) - parseInt(txtSecondNumValue);
                if (!isNaN(result1)) {
                    document.getElementById('final_pending_departmental_investigation').value = result1;
                }

                // console.log(result);
                // console.log(result1);
                // console.log(txtFirstNumValue);
                // console.log(txtSecondNumValue);
                // console.log(result2);
                // console.log(result3);

            }

        </script>
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>