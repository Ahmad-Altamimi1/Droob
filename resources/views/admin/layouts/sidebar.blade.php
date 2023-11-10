<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="">
                <img src="{{ asset('images/logo_f.png') }} " style="width: 60px">
                <span class="brand-name">Drrob</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="">
                    <a class="sidenav-item-link" href="{{ url('admin/dashboard') }}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="">
                    <a class="sidenav-item-link" href="{{ route('admin.users.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li> --}}
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('admin.articleType.index') }}">
                        <i class="mdi mdi-certificate"></i>
                        <span class="nav-text">article Type</span>
                    </a>
                </li>
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('admin.articles.index') }}">
                        <i class="mdi mdi-projector"></i>
                        <span class="nav-text">Articles</span>
                    </a>
                </li>
             
               
             
             
                
            </ul>
        </div>
    </div>
</aside>
