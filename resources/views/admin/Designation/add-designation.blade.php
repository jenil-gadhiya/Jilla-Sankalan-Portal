<x-admin-master>
    
    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Designation</div>

                        <div class="card-body">
                            <form method="post" action="{{ route('designation.add.store') }}">
                                @csrf

                                <!-- Designation Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Designation Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="designation_name" type="text" class="form-control @error('designation_name') is-invalid @enderror" name="designation_name" value="{{ old('designation_name') }}" autocomplete="designation_name" autofocus>

                                        @error('designation_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Add Designation -->
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Designation
                                        </button>
                                        
                                        {{-- This is for dispaly Message After Designation successfully added --}}
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