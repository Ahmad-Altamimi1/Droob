<!-- Header -->
<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <span class="page-title">dashboard</span>

        <div class="navbar-right ">



            <ul class="nav navbar-nav">
                <!-- Offcanvas -->


                @php
                    $id = Auth::user()->id;
                    $profileData = App\Models\Admin::findOrFail($id);
                @endphp
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ !empty($profileData->image) ? asset('images/admins/' .$profileData->image) : url('no_image.png') }}"
 
                            class="user-image rounded-circle" alt="{{ $profileData->name }} Image" />


                        <span class="d-none d-lg-inline-block">{{ $profileData->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <form action="{{ route('admin.logout_handler') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">
                                    <i class="mdi mdi-account-outline"></i>
                                    Log out
                                </button>
                            </form>
                        </li>
                    </ul>

                </li>
            </ul>
        </div>
    </nav>


</header>
