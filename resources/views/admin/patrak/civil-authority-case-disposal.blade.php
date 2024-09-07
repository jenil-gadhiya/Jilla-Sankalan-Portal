<x-admin-master>
    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">નાગરિક અધિકાર (ખરડા) અન્વયે મળેલ અરજીઓના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</h6>
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
                                <th rowspan="3">કચેરીનું નામ</th>
                                <th rowspan="3">કક્ષા</th>
                                <th rowspan="3">માસનું નામ</th>
                                <th rowspan="3">અગાઉના માસ અંતે પડતર અરજીઓ</th>
                                <th rowspan="3">માસ દરમિયાન મળેલ અરજીઓ</th>
                                <th rowspan="3">કુલ</th>
                                <th colspan="5">નિકાલ</th>
                                <th colspan="2">બાકી</th>
                                <th rowspan="3">કુલ બાકી (5-10) અને 11+12</th>
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
                                      
                        
                        <tbody align="center" id="tablebody">

                            {{-- @foreach ($patrak_data as $data)

                                <tr align="center">    
                                                       
                                    <td>{{ $data->kacheri_name }}</td>
                                    <td>{{ $data->designation_name }}</td>
                                    <td>{{ $data->month_name }}</td>
                                    <td>{{ $data->previous_month_pending_case }}</td>
                                    <td>{{ $data->cases_of_current_month }}</td>
                                    <td>{{ $data->total_of_previous_month_pending_case_and_cases_of_current_month }}</td>
                                    <td>{{ $data->dispose_within_deadline_positive }}</td>
                                    <td>{{ $data->dispose_within_deadline_negative }}</td>
                                    <td>{{ $data->dispose_after_deadline_positive }}</td>
                                    <td>{{ $data->dispose_after_deadline_negative }}</td>
                                    <td>{{ $data->total_dispose }}</td>
                                    <td>{{ $data->case_pending_within_deadline }}</td>
                                    <td>{{ $data->case_pending_after_deadline }}</td>
                                    <td>{{ $data->total_pending_cases }}</td>
                                    <td>{{ $data->remarks }}</td>
                                    
                                </tr>

                            @endforeach --}}
                            
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
                <span data-href="/patrak/civil-authority-case-disposal/csv" class="text" onclick="exportTasks(this);">{{ __('EXCEL') }}</span>   
            </button> 
            &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-danger btn-icon-split">
                <span data-href="/patrak/civil-authority-case-disposal/pdf" class="text" onclick="exportPdf(this);">{{ __('PDF') }}</span>         
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
                    url: "{{ route('admin.patrak.civil.fetchdata') }}",
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
                                         <td>' + value.month_name + '</td>\
                                         <td>' + value.previous_month_pending_case + '</td>\
                                         <td>' + value.cases_of_current_month + '</td>\
                                         <td>' + value.total_of_previous_month_pending_case_and_cases_of_current_month + '</td>\
                                         <td>' + value.dispose_within_deadline_positive + '</td>\
                                         <td>' + value.dispose_within_deadline_negative + '</td>\
                                         <td>' + value.dispose_after_deadline_positive + '</td>\
                                         <td>' + value.dispose_after_deadline_negative + '</td>\
                                         <td>' + value.total_dispose + '</td>\
                                         <td>' + value.case_pending_within_deadline + '</td>\
                                         <td>' + value.case_pending_after_deadline + '</td>\
                                         <td>' + value.total_pending_cases + '</td>\
                                         <td>' + value.remarks + '</td>\
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