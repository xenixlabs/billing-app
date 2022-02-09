<ul class="bg-gray-900 shadow navbar-nav sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="mt-4 mb-4 sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="mx-3 sidebar-brand-text">sckycap</div> --}}
        <img src="{{ asset('img/profile.png') }}" alt="" height="380%" width="auto" >

    </a>

    <!-- Divider -->
    <hr class="my-0 sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Masters Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Masters</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="/masters/create">Add New</a>
                <a class="collapse-item" href="/masters">View All</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Challans -->
    <li class="nav-item">
        <a class="nav-link" href="/challan">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Challans</span>
        </a>
    </li>

    <!-- Nav Item - Monthly Reports -->
    <li class="nav-item">
        <a class="nav-link" href="/monthly-report">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Monthly Reports</span></a>
    </li>

    <!-- Nav Item - Reset Password -->
    <li class="nav-item">
        <a class="nav-link" href="/reset-password">
            <i class="fas fa-fw fa-key"></i>
            <span>Reset Password</span></a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-lock"></i>
            <span>Logout</span></a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>

</ul>
