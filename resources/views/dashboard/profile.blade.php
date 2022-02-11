@extends('dashboard/partials/top-bar')

@section('contant')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile 2</li>
                    </ol>
                </div> --}}
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="assets/img/{{$student[0]->adno}}.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{$student[0]->name}}</h4>
                    <p class="text-muted font-14">Class: {{$student[0]->class}}</p>

                    <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                    <div class="text-start mt-3">
                        {{-- <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p> --}}
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$student[0]->name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">9747372112</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.com</span></p>

                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">INDIA</span></p>
                    </div>

                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                        </li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

            <!-- Messages-->
            

        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Print
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                Usage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="aboutme">

                            

                                <div class="col-sm-4">
                                    <div class="card tilebox-one">
                                        <div class="card-body">
                                            <i class="dripicons-basket float-end text-muted"></i>
                                            <h6 class="text-muted text-uppercase mt-0">Print Cash</h6>
                                           @if (count($printcash)>0)
                                           <h2 class="m-b-20">₹{{$printcash[0]->amount}}/-</h2>
                                           @else
                                           <h2 class="m-b-20">₹0/-</h2>
                                           @endif
                                            
                                            
                                            
                                            <span class="badge bg-primary"></span> <span class="text-muted">To  <script>document.write((new Date()).getFullYear() +" " );
                                             document.write((new Date()).toLocaleString('default', { month: 'long' }));</script> period</span>
                                        </div> <!-- end card-body-->
                                    </div> <!--end card-->
                                </div><!-- end col -->
                            <!-- end timeline -->        

                           
                            

                        </div> <!-- end tab-pane -->
                        <!-- end about me section content -->

                        <div class="tab-pane show active" id="timeline">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">LAB USAGE</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Internet</th>
                                                    <th>Time</th>
                                                    <th>Registered By</th>
                                                    <th>Net Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                      @foreach ($labUsage as $labUsage)
                                      <tr>
                                        <td>{{$labUsage->created_at->format("d-M-Y")}}</td>
                                        <td>{{$labUsage->status}}</td>
                                        @if ($labUsage->internet==="Yes")

                                        <td><span class="badge bg-success">{{$labUsage->internet}}</span></td>
                                        @else
                                            <td><span class="badge bg-danger">{{$labUsage->internet}}</span></td>

                                    
                                        @endif
                                       
                                        <td>{{$labUsage->time}}Minute</td>
                                        <td>{{$labUsage->registeredby}}</td>
                                        {{-- <td>{{\Carbon\Carbon::parse($labUsage->admittime)->diff($labUsage->lefttime)->format('%H:%I')}}</td> --}}
                                    </tr>
                                      @endforeach          
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- end table responsive-->
                                </div> <!-- end col-->
                            </div> <!-- end row-->

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">
                            {{-- <form>
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="userbio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                            <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                            <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="companyname" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cwebsite" class="form-label">Website</label>
                                            <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-fb" class="form-label">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                                <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-tw" class="form-label">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                                <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-insta" class="form-label">Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                                <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-lin" class="form-label">Linkedin</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                                <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-sky" class="form-label">Skype</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                                <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-gh" class="form-label">Github</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                                <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form> --}}
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div>

    @endsection
