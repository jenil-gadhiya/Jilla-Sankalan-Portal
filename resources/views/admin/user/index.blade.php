<x-admin-master>
    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>માસિક પત્રકો ({{$month_name}})</center></h6>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Entry Completed : <span style="color : Green">YES</span> &nbsp;&nbsp; | &nbsp;&nbsp; Entry Pending : <span style="color : Red">NO</span> &nbsp;&nbsp;</h6>
            </div>
            
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       
                        {{-- Check if User does not have permission to fill patrak --}}
                        @if ($patraks->count() > 0)

                            <tr align="center">
                                <th rowspan="2">યુઝર નામ</th>
                                <th rowspan="2">કચેરીનું નામ</th>
                                <th rowspan="2">કક્ષા</th>
                                <th colspan="9">પત્રક નામ</th>
                            </tr>
                            <tr align="center">
                                @foreach ($patraks as $patrak)
                                    <th>{{ $patrak->patrak_guj_name }}</th>
                                @endforeach
                            </tr>

                            <tbody align="center">
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->kacheri_name }}</td>
                                    <td>{{ $user->designation_name }}</td>
                                    @foreach ($patraks as $patrak)
                                        <td>{!! isset($expirePatrakData[$user->id][$patrak->id]) ? (($expirePatrakData[$user->id][$patrak->id]==1) ? "<span style=\"color : Green\">YES</span>" : "<span style=\"color : Red\">NO</span>") : "<span style=\"color : #4e73df\">N/A</span>" !!}</td>    
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        @else
                            {{-- This is for dispaly Message After User successfully deleted --}}                                                        
                            @include('sweetalert::alert')
                        @endif
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        {{-- <script>

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
        </script> --}}
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>