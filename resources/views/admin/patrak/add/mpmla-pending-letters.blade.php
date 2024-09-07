<x-admin-master>
    @section('content')

    <form method="post" action="{{ route('patrak.add.store.mpmla') }}">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">MP-MLA Pending Letters</h6>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="2">કક્ષા</th>
                            <th rowspan="2">District</th>
                            <th colspan="2">Total</th>
                            <th rowspan="2">Disposed</th>
                            <th colspan="5">Pending Upto</th> 
                        </tr>

                        <tr align="center">
                            <th>Letter pending as on 01/04/2021</th>
                            <th>Letter receive during 01/04/2021 to 30/11/21</th>
                            <th>15 days</th>
                            <th>1 Month</th>
                            <th>3 Month</th>
                            <th>6 Month</th>
                            <th>Above 6 Month</th>
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
                                        <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ $old_data->district }}" autocomplete="district"  style="width: 8rem; text-align: center;">

                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="letters_pending" type="text" class="form-control @error('letters_pending') is-invalid @enderror" name="letters_pending" value="{{ $old_data->letters_pending}}" autocomplete="letters_pending" style="width: 8rem; text-align: center;" >

                                        @error('letters_pending')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="letters_received" type="text" class="form-control @error('letters_received') is-invalid @enderror" name="letters_received" value="{{ $old_data->letters_received }}" autocomplete="letters_received" style="width: 8rem; text-align: center;" >

                                        @error('letters_received')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed" type="text" class="form-control @error('disposed') is-invalid @enderror" name="disposed" value="{{ $old_data->disposed }}" autocomplete="disposed"  style="width: 8rem; text-align: center;" >

                                        @error('disposed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_15_days" type="text" class="form-control @error('pending_upto_15_days') is-invalid @enderror" name="pending_upto_15_days" value="{{ $old_data->pending_upto_15_days }}" autocomplete="pending_upto_15_days" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_15_days')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_above_1_month" type="text" class="form-control @error('pending_above_1_month') is-invalid @enderror" name="pending_above_1_month" value="{{ $old_data->pending_above_1_month }}" autocomplete="pending_above_1_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_above_1_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_3_month" type="text" class="form-control @error('pending_upto_3_month') is-invalid @enderror" name="pending_upto_3_month" value="{{ $old_data->pending_upto_3_month }}" autocomplete="pending_upto_3_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_3_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_6_month" type="text" class="form-control @error('pending_upto_6_month') is-invalid @enderror" name="pending_upto_6_month" value="{{ $old_data->pending_upto_6_month }}" autocomplete="pending_upto_6_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_6_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_above_6_month" type="text" class="form-control @error('pending_above_6_month') is-invalid @enderror" name="pending_above_6_month" value="{{ $old_data->pending_above_6_month }}" autocomplete="pending_above_6_month"  style="width: 8rem; text-align: center;" >

                                        @error('pending_above_6_month')
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
                                        <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('$district') }}" autocomplete="district"  style="width: 8rem; text-align: center;">

                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="letters_pending" type="text" class="form-control @error('letters_pending') is-invalid @enderror" name="letters_pending" value="{{ old('letters_pending') }}" autocomplete="letters_pending" style="width: 8rem; text-align: center;" >

                                        @error('letters_pending')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="letters_received" type="text" class="form-control @error('letters_received') is-invalid @enderror" name="letters_received" value="{{ old('letters_received') }}" autocomplete="letters_received" style="width: 8rem; text-align: center;" >

                                        @error('letters_received')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="disposed" type="text" class="form-control @error('disposed') is-invalid @enderror" name="disposed" value="{{ old('disposed') }}" autocomplete="disposed"  style="width: 8rem; text-align: center;" >

                                        @error('disposed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_15_days" type="text" class="form-control @error('pending_upto_15_days') is-invalid @enderror" name="pending_upto_15_days" value="{{ old('pending_upto_15_days') }}" autocomplete="pending_upto_15_days" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_15_days')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_above_1_month" type="text" class="form-control @error('pending_above_1_month') is-invalid @enderror" name="pending_above_1_month" value="{{ old('pending_above_1_month') }}" autocomplete="pending_above_1_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_above_1_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_3_month" type="text" class="form-control @error('pending_upto_3_month') is-invalid @enderror" name="pending_upto_3_month" value="{{ old('pending_upto_3_month') }}" autocomplete="pending_upto_3_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_3_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_upto_6_month" type="text" class="form-control @error('pending_upto_6_month') is-invalid @enderror" name="pending_upto_6_month" value="{{ old('pending_upto_6_month') }}" autocomplete="pending_upto_6_month" style="width: 8rem; text-align: center;" >

                                        @error('pending_upto_6_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="pending_above_6_month" type="text" class="form-control @error('pending_above_6_month') is-invalid @enderror" name="pending_above_6_month" value="{{ old('pending_above_6_month') }}" autocomplete="pending_above_6_month"  style="width: 8rem; text-align: center;" >

                                        @error('pending_above_6_month')
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
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>