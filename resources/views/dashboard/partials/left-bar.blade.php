@extends('dashboard/partials/footer')

@section('left-bar')
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="25">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="25">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="25">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="25">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">ADMIN</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    {{-- <span class="badge bg-success float-end">4</span> --}}
                    <span> Dashboard </span>
                </a>
                {{-- <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="dashboard-crm.html">CRM</a>
                        </li>
                        <li>
                            <a href="index.html">Ecommerce</a>
                        </li>
                        <li>
                            <a href="dashboard-projects.html">Projects</a>
                        </li>
                    </ul>
                </div> --}}
            </li>
            @if (Auth::user()->type !='USER' && Auth::user()->type !='ADMIN')

            <li class="side-nav-item">
                <a href="{{ route('students') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Students </span>
                </a>
            </li>
                


          

                      
            @endif
            
            @if (Auth::user()->type !='USER')
            
            <li class="side-nav-item">
                <a href="{{ route('reg') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Register </span>
                </a>
            </li>
                
            @endif
          

            <li class="side-nav-title side-nav-item">LAB DUTY USER</li>
            <li class="side-nav-item">
                <a href="{{ route('all') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> All </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('verify') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Admit </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('verified') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Admitted </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('left') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Left </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('print') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Print & Net </span>
                </a>
            </li>
            

            

            

            

        
        </ul>

        <!-- Help Box -->
        {{-- <div class="help-box text-white text-center">
            <a href="javascript: void(0);" class="float-end close-btn text-white">
                <i class="mdi mdi-close"></i>
            </a>
            <img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image">
            <h5 class="mt-3">Unlimited Access</h5>
            <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
            <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">Upgrade</a>
        </div> --}}
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
@yield('top-bar')


@endsection