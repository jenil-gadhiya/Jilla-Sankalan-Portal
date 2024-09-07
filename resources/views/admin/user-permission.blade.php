<x-admin-master>

    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" align="center">યુર્ઝસ પરવાનગી</h6>
            </div>

            <form method="post" action="{{ route('user.permission.store') }}">
                @csrf
                <div class="card-body">

                    {{-- Select Kacheri --}}
                    <select id="kacheri_id" size="1" class="btn btn-secondary dropdown-toggle" name="kacheri_id" value="{{ 'kacheri_id' }}" required autocomplete="kacheri_id" autofocus>
                        <option value="">Select Kacheri</option>

                        {{$kacheries = App\Models\Kacheri::all();}}
                        @foreach($kacheries as $kacheri)
                            <option value="{{$kacheri->id}}">{{$kacheri->kacheri_name}}</option>
                        @endforeach

                    </select>


                    {{-- Select Department --}}
                    {{-- This Display Departments That belogs to perticular kacheri --}}
                    <select id="dept_id" size="1" class="btn btn-secondary dropdown-toggle" name="dept_id" value="{{ 'dept_id' }}" required autocomplete="dept_id" autofocus>
                        <option value="">Select Department</option>
                    </select>


                    {{-- Select User --}}
                    {{-- This Display User That belogs to perticular kacheri and Department --}}
                    {{-- This will store derpartmnet_kacheri_users id --}}
                    <select id="user_id" size="1" class="btn btn-secondary dropdown-toggle" name="user_id" value="{{ 'user_id' }}" required autocomplete="user_id" autofocus>
                        <option value="">Select User</option>
                    </select>
                </div>


                
                <div class="card-body" align="left">

                    <!-- Patraks -->                   
                    @foreach ($patraks as $patrak)

                        <input type="checkbox" id="patrak_{{ $patrak->id }}" name="patrak_name[]" value="{{ $patrak->id }}" {{$patrak->patrak_guj_name}}>
                        <label for="customCheck">{{$patrak->patrak_guj_name}}</label><br>

                        @error('patrak_name[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>

                    @endforeach            


                    {{-- Save The User Permission --}}
                    <div class="my-2" align="center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Permission') }}
                        </button> 
                            {{-- This is for dispaly Message After Kacheri successfully added --}}
                            @include('sweetalert::alert')
                    </div>
                    
                </div>

            </form>

        </div>

    @endsection

    @section('scripts')
        
        <script>

            $(document).ready(function() {
                $('#kacheri_id').on('change', function() {
                    var idKacheri = this.value;
                    $("#dept_id").html('');
                    $.ajax({
                        url: "{{url('user/user-permission/fetch-kacheri')}}",
                        type: "POST",
                        data: {
                            kacheri_id: idKacheri,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            for(var i = 1; i <= 9; i++)
                            {
                                $("#patrak_"+i).attr('checked',false);
                            }

                            $('#dept_id').html('<option value="">Select Department</option>');
                            $.each(result.departments, function(key, value) {
                                $("#dept_id").append('<option value="' + value
                                    .id + '">' + value.department_name + '</option>');
                            });
                            $('#user_id').html('<option value="">Select User</option>');
                        }
                    });
                });
                $('#dept_id').on('change', function() {
                    var idDept = this.value;
                    $("#user_id").html('');
                    $.ajax({
                        url: "{{url('user/user-permission/fetch-Department')}}",
                        type: "POST",
                        data: {
                            dept_id: idDept,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(res) {
                            for(var i = 1; i <= 9; i++)
                            {
                                $("#patrak_"+i).attr('checked',false);
                            }

                            $('#user_id').html('<option value="">Select User</option>');
                            $.each(res.users, function(key, value) {
                                $("#user_id").append('<option value="' + value
                                    .user_id + '">' + value.name + '</option>');
                            });

                        }
                    });
                });
                $('#user_id').on('change', function() {
                    var idUser = this.value;
                    $.ajax({
                        url: "{{url('user/user-permission/fetch-user')}}",
                        type: "POST",
                        data: {
                            user_id: idUser,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(res) {
                            for(var i = 1; i <= 9; i++)
                            {
                                $("#patrak_"+i).attr('checked',false);
                            }

                            $.each(res, function(key, value) {
                                console.log(value);
                                $("#patrak_"+value).attr('checked',true);
                            });
                        }
                    });
                });

            });

        </script>

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection

</x-admin-master>