<x-admin-master>
    
    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Department</div>

                        <div class="card-body">
                            <form method="post" action="{{ route('department.add.store') }}">
                                @csrf

                                <!-- Department Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Department Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name') }}" autocomplete="department_name" autofocus>

                                        @error('department_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Add Department -->
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Department
                                        </button>
                                        
                                        {{-- This is for dispaly Message After Department successfully added --}}
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