<x-admin-master>
    
    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Kacheri</div>

                        <div class="card-body">
                            <form method="post" action="{{ route('kacheri.add.store') }}">
                                @csrf

                                <!-- Kacheri Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Kacheri Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="kacheri_name" type="text" class="form-control @error('kacheri_name') is-invalid @enderror" name="kacheri_name" value="{{ old('kacheri_name') }}" autocomplete="kacheri_name" autofocus>

                                        @error('kacheri_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Departments -->
                                <div class="row mb-3">
                                    <label for="departments" class="col-md-4 col-form-label text-md-end">{{ __('Departments') }}</label>
                                    <div class="col-md-6">
                                        {{-- <input type="checkbox" value="xyz" name="xyz"> --}}
                                        @foreach ($departments as $department)

                                            {{-- This Will Display Other at Last Record in UI --}}
                                            @if (Str::lower($department->department_name) != Str::lower('other'))
                                                <input type="checkbox" id="dept[]" name="dept[]" value="{{ $department->id }}" {{$department->department_name}}>
                                                <label for="customCheck">{{$department->department_name}}</label><br>

                                                @error('dept[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                            @endif
                                        
                                        @endforeach
                                        {{-- This is for insert others option at the last --}}
                                        <input type="checkbox" id="dept[]" name="dept[]" value="{{ $other_record_in_department->id }}" {{$other_record_in_department->department_name}}>
                                        <label for="customCheck">{{$other_record_in_department->department_name}}</label><br>

                                        @error('dept[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Add Kacheri -->
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Kacheri
                                        </button>
                                        
                                        {{-- This is for dispaly Message After Kacheri successfully added --}}
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

</x-admin-master>