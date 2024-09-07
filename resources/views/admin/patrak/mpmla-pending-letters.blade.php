<x-admin-master>
    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">MP-MLA Pending Letters</h6>
            </div>
            <!-- Sorting Option (Dropdown list) -->
            <div class="card-body">
                <div class="card-body" align="right"> 

                    {{-- Check if user is Admin or not --}}
                    @if (Auth::user()->isAdmin())
                        {{-- Select Kacheri --}}
                        <select id="kacheri_id" size="1" class="btn btn-secondary dropdown-toggle" name="kacheri_id" value="{{ 'kacheri_id' }}" required autocomplete="kacheri_id" onchange="getdata();">
                            <option value="">Select Kacheri</option>
                        
                            @foreach($fetchKacheries as $kacheri)
                                <option value="{{$kacheri->id}}">{{$kacheri->kacheri_name}}</option>
                            @endforeach

                        </select> 
                    @endif

                    {{-- Select Month Year --}}
                    <select id="month_year" size="1" class="btn btn-secondary dropdown-toggle" name="month_year" value="{{ 'month_year' }}" required autocomplete="month_year" onchange="getdata();">
                        <option value="">Select Month</option>
                       
                        {{-- This will remove duplicate values --}}
                        @foreach($fetchMonthYear as $month)
                            @if ($month->current_month == $month_name)
                                <option value="{{$month->current_month}}" selected>{{$month->current_month}}</option>
                            @else
                                <option value="{{$month->current_month}}">{{$month->current_month}}</option>
                            @endif
                        @endforeach

                    </select> 
                    

                    <!-- Search Bar -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>                   
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th rowspan="2">કચેરીનું નામ</th>
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
                        
                        
                        <tbody align="center" id="tablebody">
                            {{-- <tr align="center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                        </tbody>
                    </table>

                    {{-- For Display if no data found --}}
                    <div id="noDataFound">
                    </div>

                </div>
            </div>
        </div>

        <div class="my-2" align="center">
            <button  type="button" class="btn btn-success btn-icon-split" >
                <span data-href="/patrak/mpmla-pending-letters/csv" class="text" onclick="exportTasks(this);">{{ __('EXCEL') }}</span>   
            </button> 
            &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-danger btn-icon-split">
                <span data-href="/patrak/mpmla-pending-letters/pdf" class="text" onclick="exportPdf(this);">{{ __('PDF') }}</span>         
            </button> 
        </div> 

        
    @endsection

    @section('scripts')
        <script>

            jQuery(document).ready(function($){

                getdata();
                    
            });
            function getdata()
            {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                var formData = {
                    kacheri: jQuery('#kacheri_id').val(),
                    month: jQuery('#month_year').val(),
                };
                // console.log(formData.kacheri);
                // console.log(formData.month);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.patrak.mpmla.fetchdata') }}",
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        // console.log(data.patrak_data);

                        var html = '';
                        var nodata = '';
                        var patrak_data = data.patrak_data;
                        if(patrak_data.length > 0)
                        {
                            $.each(data.patrak_data, function(key, value) {
                            html += '<tr><td>' + value.kacheri_name + '</td>\
                                        <td>' + value.designation_name + '</td>\
                                        <td>' + value.district + '</td>\
                                        <td>' + value.letters_pending + '</td>\
                                        <td>' + value.letters_received + '</td>\
                                        <td>' + value.disposed + '</td>\
                                        <td>' + value.pending_upto_15_days + '</td>\
                                        <td>' + value.pending_above_1_month + '</td>\
                                        <td>' + value.pending_upto_3_month + '</td>\
                                        <td>' + value.pending_upto_6_month + '</td>\
                                        <td>' + value.pending_above_6_month + '</td>\
                                    </tr>';    
                            });
                            nodata = '';
                        }
                        else
                        {
                            nodata ='<div class="text-center">\
                                        <h1 class="h3 mb-4 text-gray-800">No Data Found</h1>\
                                    </div>';
                            html += '';
                        }
                        $("#tablebody").html(html);
                        $("#noDataFound").html(nodata);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                }); 
            }
            function exportTasks(_this) {
                console.log(_this);
                let _url = $(_this).data('href');
                window.location.href = _url + '?kacheri_id=' + jQuery('#kacheri_id').val()  + '&month_year=' + jQuery('#month_year').val();
            }
            function exportPdf(_this) {
                console.log(_this);
                let _url = $(_this).data('href');
                window.location.href = _url + '?kacheri_id=' + jQuery('#kacheri_id').val() + '&month_year=' + jQuery('#month_year').val();
            }
        </script>

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>