<x-admin-master>
    @section('content')
    {{-- <div class="my-2">
        <a href="/register" class="btn btn-primary btn-icon-split">
            <span class="text">ADD USER</span>
        </a>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <a href="{{route('kacheri.add')}}" class="btn btn-primary btn-icon-split">
            <span class="text">ADD KACHERI</span>
        </a>
    </div> --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>યુઝર યાદી</center></h6>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                        <tr align="center">
                            <th>SR NO.</th>
                            <th>USERTYPE</th>
                            <th>NAME</th>
                            <th>KACHERI</th>
                            <th>DEPARTMENT</th>
                            <th>DESIGNATION</th>
                            <th>EMAIL</th>
                            <th>MOBILE NO.</th>
                            <th>ADDRESS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        <tbody align="center">
                        
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$user->user_type}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        {{-- Display kacheri according to th user --}}
                                        @foreach ($getUserId_KacheriName_DepartmentName as $findKacheriName)
                                            @if (($findKacheriName->user_id) == ($user->id))
                                                {{$findKacheriName->kacheri_name;}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- Display Department according to th user --}}
                                        @foreach ($getUserId_KacheriName_DepartmentName as $findDepartmentName)
                                            @if (($findDepartmentName->user_id) == ($user->id))
                                                {{$findDepartmentName->department_name;}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- Display Designation according to th user --}}
                                        @foreach ($getUserId_DesignationName as $findDesignationName)
                                            @if (($findDesignationName->user_id) == ($user->id))
                                                {{$findDesignationName->designation_name;}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile_number}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-success btn-icon-split">
                                            <span class="text">Edit</span>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deleteUserBtn" value="{{$user->id}}">Delete</button>

                                        {{-- Model For Delete --}}
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <form method="POST" action="{{route('user.destroy')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="user_delete_id" id="user_id">
                                                            Select "Delete" below if you want to delete User.
                                                        </div>
                                                        <div class="modal-footer"> 
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <!-- For Delete link -->
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            
                                                            {{-- This is for dispaly Message After User successfully deleted --}}                                                        
                                                            @include('sweetalert::alert')
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>                    
                </div>                
            </div>
        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {{$users->links()}}
            </div>
        </div>

    @endsection

    @section('scripts')

        <script>
            $(document).ready(function() {
                $('.deleteUserBtn').click(function(e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    $('#user_id').val(user_id);
                    $('#deleteModal').modal('show');
                })
            });
        </script>
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}
    @endsection

</x-admin-master>