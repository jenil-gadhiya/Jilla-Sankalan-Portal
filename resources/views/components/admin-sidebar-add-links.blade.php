<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Add</span>
    </a>
    <div id="collapseAdd" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ADD NEW</h6>
            <a class="collapse-item" href="{{ route('kacheri.add') }}">Kacheri</a>
            <a class="collapse-item" href="{{ route('department.add') }}">Department</a>
            <a class="collapse-item" href="{{ route('designation.add') }}">Designation</a>
        </div>
    </div>
</li>