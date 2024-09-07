<x-admin-master>
    
    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('EDIT USER') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <!-- User Type -->
                                <div class="row mb-3">
                                    <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                                    <div class="col-md-6">
                                        {{-- <input id="user_type" value="{{$user->user_type}}" type="text" disabled=true class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type" autofocus> --}}
                                        
                                        <select id="user_type"  size="1" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type" autofocus>
                                            <option value="">Select User Type</option>
                                            {{-- Display Selected user_type --}}
                                            @if ($user->user_type == "admin")
                                                <option value="admin" selected>Admin</option>
                                                <option value="user">User</option>
                                            @elseif ($user->user_type == "user")
                                                <option value="admin"   >Admin</option>
                                                <option value="user" selected>User</option>
                                            @endif
                                            
                                        </select>
                                        @error('user_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Select Kacheri -->
                                <div class="row mb-3">
                                    <label for="kacheri_id" class="col-md-4 col-form-label text-md-end">{{ __('Kacheri') }}</label>
                                    <div class="col-md-6">
                                        {{-- <input id="kacheri_id" value="{{$getUserId_KacheriName_DepartmentName->kacheri_name}}" type="text" disabled=true class="form-control @error('kacheri_id') is-invalid @enderror" name="kacheri_id" value="{{ old('kacheri_id') }}" required autocomplete="kacheri_id" autofocus> --}}
                                        <select id="kacheri_id" size="1" class="form-control @error('kacheri_id') is-invalid @enderror" name="kacheri_id" value="{{ 'kacheri_id' }}" required autocomplete="kacheri_id" autofocus>
                                            <option value="">Select Kacheri</option>
                                            {{$kacheries = App\Models\Kacheri::all();}}
                                            {{-- This will display all the kacheris --}}
                                            @foreach($kacheries as $kacheri)
                                                @if ($getUserId_KacheriName_DepartmentName->kacheri_name == $kacheri->kacheri_name)
                                                    <option value="{{$kacheri->id}}" selected>{{$kacheri->kacheri_name}}</option>   
                                                @else
                                                    <option value="{{$kacheri->id}}">{{$kacheri->kacheri_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('kacheri_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Select Department -->
                                <div class="row mb-3">
                                    <label for="dept_id" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                                    <div class="col-md-6">
                                        {{-- <input id="dept_id" value="{{$getUserId_KacheriName_DepartmentName->department_name}}" type="text" disabled=true class="form-control @error('dept_id') is-invalid @enderror" name="dept_id" value="{{ old('dept_id') }}" required autocomplete="dept_id" autofocus> --}}
                                        <select id="dept_id" size="1" class="form-control @error('dept_id') is-invalid @enderror" name="dept_id" value="{{ old('dept_id') }}" required autocomplete="dept_id" autofocus>
                                            <option value="">Select Department</option>
                                            {{-- Display those department which belongs to selected kacheri --}}
                                            @foreach($getDepartmentKachriIdAndDepartmentName as $department_kacheri)
                                                @if ($getUserId_KacheriName_DepartmentName->department_name == $department_kacheri->department_name)
                                                    <option value="{{$department_kacheri->id}}" selected>{{$department_kacheri->department_name}}</option>   
                                                @else
                                                    <option value="{{$department_kacheri->id}}">{{$department_kacheri->department_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('dept_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Select Designation -->
                                <div class="row mb-3">
                                    <label for="designation_user_id" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                                    <div class="col-md-6">
                                        {{-- <input id="designation_user_id" value="{{$getUserId_KacheriName_DepartmentName->kacheri_name}}" type="text" disabled=true class="form-control @error('designation_user_id') is-invalid @enderror" name="designation_user_id" value="{{ old('designation_user_id') }}" required autocomplete="designation_user_id" autofocus> --}}
                                        <select id="designation_user_id" size="1" class="form-control @error('designation_user_id') is-invalid @enderror" name="designation_user_id" value="{{ 'designation_user_id' }}" required autocomplete="designation_user_id" autofocus>
                                            <option value="">Select Designation</option>
                                            {{$designations = App\Models\Designation::all();}}
                                            {{-- This will display all the kacheris --}}
                                            @foreach($designations as $designation)
                                                @if ($getUserId_DesignationName_DesignationId->designation_name == $designation->designation_name)
                                                    <option value="{{$designation->id}}" selected>{{$designation->designation_name}}</option>   
                                                @else
                                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('designation_user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mobile Number -->
                                <div class="row mb-3">
                                    <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="mobile_number" value="{{$user->mobile_number}}" type="number" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number" autofocus>

                                        @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" value="{{$user->address}}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    
                                
                                {{-- <!-- Password -->
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm password -->
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}

                                <!-- Save Changes -->
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save Changes') }}
                                        </button>
                                        @include('sweetalert::alert')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection


    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#kacheri_id').on('change', function() {
                var idKacheri = this.value;
                $("#dept_id").html('');
                $.ajax({
                    url: "{{url('user/add-user/fetch-kacheri')}}",
                    type: "POST",
                    data: {
                        kacheri_id: idKacheri,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#dept_id').html('<option value="">Select Department</option>');
                        $.each(result.departments, function(key, value) {
                            $("#dept_id").append('<option value="' + value
                                .id + '">' + value.department_name + '</option>');
                        });
                        // $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    @endsection

</x-admin-master>