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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div> --}}
                    <h4 class="page-title">Students</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="javascript:void(0);" onclick="openAddForm()" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Student</a>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                           

{{-- 
content --}}

                            
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->


    <div id="openAddForm" hidden>
        <span class="helper"></span>
        <div>
            <div class="rightbar-title title">
                <h5 class="m-0">Add New</h5>
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon close-icon" onclick="closeForm()"></i>
                </a>

            </div>

            <div class="student_adding_form">
                <form method="POST" action="{{ route('addNew') }}" id="addForm">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div> --}}
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Ad No:</label>
                        <input class="form-control" name="adno" id="adno" type="number" name="number">
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Time:</label>
                        <select class="form-select" name="time" id="class">
                            <option value="" disabled>select</option>
                            <option value="30mnt">30mnt</option>
                            <option value="45mnt">45mnt</option>
                            <option value="2hr">2hr</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Internet?:</label>
                        <select class="form-select" name="internet" id="class">
                            <option value="" disabled>select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <input type="hidden" value="null" name="status">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>



@endsection
