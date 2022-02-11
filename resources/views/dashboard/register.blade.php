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
                                <a href="" data-bs-toggle="modal" data-bs-target="#standard-modal"
                                    class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Register New</a>

                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end" style="display: flex;
                                justify-content: flex-end;">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <form action="{{ route('exportLabData') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-light mb-2">Export</button>

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
                                        <th class="all">NAME</th>
                                        <th>AD.NO</th>
                                        <th>CLASS</th>
                                        <th>TIME</th>
                                        <th>INTERNET ?</th>
                                        <th>SYSTEM</th>
                                        <th style="width: 85px;">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allList as $list)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="assets/img/{{ $list->adno }}.jpg" title="contact-img"
                                                    class="me-2 rounded-circle" height="48" width="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="" class="text-body">{{ $list->name }}</a>
                                                    <br>
                                                    {{-- <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span> --}}
                                                </p>
                                            </td>
                                            <td>
                                                {{ $list->adno }}

                                            </td>
                                            <td>

                                                {{ $list->class }}
                                            </td>
                                            <td>
                                                {{ $list->time }}
                                            </td>

                                            <td>
                                                {{ $list->internet }}
                                            </td>
                                            <td>
                                                {{ $list->system }}
                                            </td>
                                            <td>
                                                @if ($list->status === 'REGISTERED')

                                                    <span class="badge badge-primary-lighten">REGISTERED</span>

                                                @elseif($list->status === 'ADMITTED')
                                                    <span class="badge badge-success-lighten">ADMITTTED</span>

                                                @else
                                                    <span class="badge badge-danger-lighten">LEFT</span>
                                                @endif


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
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Register New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('addNew') }}" id="addForm">
                        @csrf
                        {{-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div> --}}
                        <div class="mb-3">
                            <label for="example-number" class="form-label">Ad No:</label>
                            <input class="form-control" name="adno" id="adno" type="number" onfocusout="getDetiles()"
                                name="number">
                            <input type="hidden" value="{{ Auth::user()->name }}" name="registeredby">
                            <input type="hidden" value="NULL" name="admittedby">
                            <input type="hidden" value="NULL" name="leftedby">
                            <input type="hidden" value="0" name="netamount">
                        </div>
                        <div class="mb-3">
                            <label for="example-readonly" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" readonly="" value="Name">
                        </div>
                        <div class="mb-3">
                            <label for="example-readonly" class="form-label">Class</label>
                            <input type="text" id="class" class="form-control" readonly="" value="Class">
                        </div>
                        {{-- <div class="mb-3">
                        <label for="example-disable" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" disabled="" value="Name">
                    </div>
                    <div class="mb-3">
                        <label for="example-disable" class="form-label">Class</label>
                        <input type="text" class="form-control" id="class" disabled="" value="Class">
                    </div> --}}
                        {{-- <div class="mb-3">
                        <label for="example-number" class="form-label">Name</label>
                        <input class="form-control" value="" name="name" id="name" type="number" name="number">
                    </div>
                    <div class="mb-3">
                        <label for="example-number" class="form-label">Class</label>
                        <input class="form-control" value="" name="Class" id="Class" type="number" name="number">
                    </div> --}}
                   
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Time:</label>
                            <select class="form-select" name="time" id="class">
                                <option value="" disabled>select</option>
                                <option value="10">10mnt</option>
                                <option value="15">15mnt</option>
                                <option value="20">20mnt</option>
                                <option value="30">30mnt</option>
                                <option value="45">45mnt</option>
                                <option value="60">1hr</option>
                                <option value="120">2hr</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Internet?:</label>
                            <select class="form-select" name="internet" id="class">
                                <option value="" disabled>select</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-select" class="form-label">System?</label>
                            <select class="form-select" name="system" id="class">
                                <option value="">select</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                                <option value="C3">C3</option>
                                <option value="C4">C4</option>
                                <option value="C5">C5</option>
                                <option value="C6">C6</option>
                                <option value="C7">C7</option>
                                <option value="C8">C8</option>
                                <option value="C9">C9</option>
                                <option value="C10">C10</option>
                                <option value="C11">C11</option>
                                <option value="C12">C12</option>
                                <option value="C13">C13</option>
                                <option value="C14">C14</option>
                                <option value="C15">C15</option>
                            </select>
                        </div>
                        {{-- <script>
                        document.getElementById("admitTime").value=newDate();
                    </script> --}}
                        <input type="hidden" value="REGISTERED" name="status">
                        <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="registertime">
                        <input type="hidden" value="NULL" name="admittime">
                        <input type="hidden" value="NULL" name="lefttime">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



@endsection
