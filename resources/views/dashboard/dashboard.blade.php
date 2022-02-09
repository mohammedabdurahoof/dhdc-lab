@extends('dashboard/partials/top-bar')

@section('contant')





    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-5 col-lg-6">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="uil uil-desktop widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Computers</h5>
                                <h3 class="mt-3 mb-3">15</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="uil uil-user widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Students</h5>
                                <h3 class="mt-3 mb-3">{{ $studentCount }}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="uil uil-edit widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Registered</h5>
                                <h3 class="mt-3 mb-3">{{ $registerdCount }}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="uil uil-user-check widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Growth">Admitted</h5>
                                <h3 class="mt-3 mb-3">{{ $admittedCount }}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->

            <div class="col-xl-7 col-lg-6">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div> --}}
                        </div>
                        <h4 class="header-title mb-3">Computer Lab Usage</h4>

                        <div dir="ltr">
                            <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        @if (Auth::user()->type === 'SUPER ADMIN')
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="{{ route('register') }}" class="dropdown-item">Add New</a>
                                    <!-- item-->

                                </div>
                            </div>
                            <div id="openAddForm" hidden>
                                <span class="helper"></span>
                                <div>
                                    <div class="rightbar-title title">
                                        <h5 class="m-0">Register New</h5>
                                        <a href="javascript:void(0);" class="end-bar-toggle float-end">
                                            <i class="dripicons-cross noti-icon close-icon" onclick="closeForm()"></i>
                                        </a>

                                    </div>

                                    <div class="student_adding_form">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
            
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">User Type</label>
                                                <select class="form-select" name="type" id="example-select">
                                                    <option>ADMIN</option>
                                                    <option>USER</option>
                                                </select>
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                                        required autocomplete="new-password">
            
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Conform</label>
                                                <div class="input-group input-group-merge">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
            
            
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="#"
                                                            class="text-muted">Terms and Conditions</a></label>
                                                </div>
                                            </div>
            
                                            <div class="mb-3 text-center">
                                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                                            </div>
            
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>

                        @endif


                        <h4 class="header-title mb-3">Duty List</h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-hover mb-0">
                                <tbody>
                                    @foreach ($dutyList as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-1.jpg"
                                                        width="40" alt="Generic placeholder image">
                                                    <div>
                                                        <h5 class="mt-0 mb-1">{{ $user->name }}<small>
                                                                <script>document.write(new Date().toLocaleString("en-US"))</script> </small></h5>
                                                        <span class="font-13">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- <td class="table-action" style="width: 50px;">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                </td> --}}
                                        </tr>

                                    @endforeach




                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        @if (Auth::user()->type === 'SUPER ADMIN')
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Add New</a>
                                    <!-- item-->

                                </div>
                            </div>
                        @endif



                        <h4 class="header-title mb-3">Staff List</h4>

                        <div class="">
                            <table class="table table-centered table-nowrap table-hover mb-0">
                                <tbody>
                                    @foreach ($staff as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-1.jpg"
                                                        width="40" alt="Generic placeholder image">
                                                    <div>
                                                        <h5 class="mt-0 mb-1">{{ $user->name }}<small>
                                                                <script>
                                                                    document.write(new Date().toLocaleString("en-US"))
                                                                </script> </small></h5>
                                                        <span class="font-13">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- <td class="table-action" style="width: 50px;">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
                                    </td> --}}
                                        </tr>

                                    @endforeach




                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

        </div>
        <!-- end row-->


       

    </div>
    <!-- container -->



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->






@endsection
