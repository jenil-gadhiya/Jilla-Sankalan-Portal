<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">USER ACTION</h6>
            <a class="collapse-item" href="{{route('user.detail')}}">User Details</a>
            <a class="collapse-item" href="/register">Add User</a>
        </div>
    </div>
</li>