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
                    <h4 class="page-title">Verify</h4>
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
                                <a href="" data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Student</a>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end" style="display: flex;
                                justify-content: flex-end;">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>

                                    <button type="button" class="btn btn-light mb-2 me-1"
                                    data-bs-toggle="modal" data-bs-target="#top-modal">Import</button>
                                    <form action="{{route ('export')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-light mb-2"> Export</button>
                                    </form>
                                    
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">


                            {{-- content --}}


                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">Name</th>
                                        <th>Ad.No</th>
                                        <th>Class</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th></th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="table-user">
                                                <img src="assets/img/{{ $student->adno }}.jpg" title="contact-img"
                                                    class="me-2 rounded-circle" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="/viewStudent?adno={{ $student->adno }}" class="text-body"> {{ $student->name }}</a>
                                                    <br>
                                                    {{-- <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span> --}}
                                                </p>
                                            </td>
                                            <td>
                                                {{ $student->adno }}

                                            </td>
                                            <td>

                                                {{ $student->class }}
                                            </td>
                                            <td>
                                                9747372112
                                            </td>

                                            <td>
                                                25-10-2002
                                            </td>
                                            <td>
                                                {{-- <span class="badge bg-success">Active</span> --}}
                                            </td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" onclick=")" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                            {{-- <td>
                                                 <span class="badge bg-success">Active</span> 
                                                <form method="POST" action="{{route('makeVerify',$student->id)}}" id="addForm">
                                                    @csrf
                                                    <input type="hidden" value="admitted" name="status" id="">
                                                    <a href="{{route('makeVerify',$student->id)}}" > <button type="submit" class="btn btn-success">Verfiy</button></a>

                                                </form>
                                            </td> --}}


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

<!-- Standard modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">Standard Modal</button> --}}
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add student</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-student') }}" id="addForm">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div> --}}
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Ad No:</label>
                        <input class="form-control" name="adno" id="adno" type="number">
                    </div>
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Name:</label>
                        <input class="form-control" name="name" id="adno" type="text">
                    </div>
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Class:</label>
                        <input class="form-control" name="class" id="adno" type="number">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button  type="submit"class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Top modal -->
<div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="topModalLabel">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                           
                        </div>
                    </div>
                   
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Import</button>

            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





@endsection
