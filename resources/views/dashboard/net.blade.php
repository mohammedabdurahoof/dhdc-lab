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
                    <h4 class="page-title">Register New</h4>
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
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add New</a>

                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end" style="display: flex;
                                justify-content: flex-end;">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                            <a href="javascript:window.print()" class="btn btn-light mb-2"><i class="mdi mdi-printer"></i> Print</a>


                                    <form action="{{ route('exportPrint') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-light mb-2">Export</button>

                                    </form>
                                </div>
                            </div>
                        </div> 

                        <div class="table-responsive">
                           

{{-- 
content --}}

<table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
<thead class="table-light">
    <tr>
        <th class="all" style="width: 20px;">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck1">
                <label class="form-check-label" for="customCheck1">&nbsp;</label>
            </div>
        </th>
        <th class="all">NAME</th>
        <th>AD.NO</th>
        <th>NAME</th>
        <th>CLASS</th>
        <th>AMOUNT</th>
        <th>DATE</th>
        <th style="width: 85px;">Updated by</th>
    </tr>
</thead>
<tbody>
    @foreach ($print as $printcash)
        <tr>
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck2">
                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                </div>
            </td>
            <td>
                {{-- <img src="assets/img/.jpg" 
                                                    title="contact-img" class="me-2 rounded-circle" height="48" width="48"> --}}
                <p class="m-0 d-inline-block align-middle font-16">
                    <a href=""
                        class="text-body">{{ $loop->iteration }}</a>
                    <br>
                    {{-- <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span> --}}
                </p>
            </td>
            <td>
                {{$printcash->adno}}

            </td>
            <td>
                {{$printcash->name}}
               
            </td>
            <td>
                {{$printcash->class}}
            </td>

            <td>
                {{$printcash->amount}}
            </td>
            <td>
                {{$printcash->created_at}}
            </td>
            <td>
                {{$printcash->addedby}}

          </td>

            {{-- <td class="table-action">
                {{-- <a href="javascript:void(0);" onclick="editCall({{$student}})" class="action-icon"> <i
                        class="mdi mdi-square-edit-outline"></i></a>
                <a href="{{ route('delete', $student->id) }}" class="action-icon"> <i
                        class="mdi mdi-delete"></i></a> --}}
            </td>
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
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add New</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('addprintcash') }}" id="addForm">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div> --}}
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Ad No:</label>
                        <input class="form-control" name="adno" id="adno" type="number" placeholder="Ad.No">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="example-number" class="form-label">Name</label>
                        <input class="form-control" value="" name="name" id="name" type="number" name="number">
                    </div>
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Class</label>
                        <input class="form-control" value="" name="Class" id="Class" type="number" name="number">
                    </div> --}}
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Amount:</label>
                        <input class="form-control" name="amount" id="adno" type="number" placeholder="₹
                        ">
                    </div>
                    
                    {{-- <script>
                        document.getElementById("admitTime").value=newDate();
                    </script> --}}
                    <input type="hidden"  value="{{ Auth::user()->name }}" name="addedby">

                    
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary">Save </button>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Large modal -->
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@endsection
