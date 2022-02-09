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
                        {{-- <div class="row mb-2">
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
                        </div> --}}

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
            <th>CLASS</th>
            <th>TIME</th>
            <th>INTERNET ?</th>
            <th>PERMITTED BY</th>
            <th style="width: 85px;">VERIFY</th>
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
                    <img src="assets/img/{{$list->adno}}.jpg" 
                                                        title="contact-img" class="me-2 rounded-circle prof-img" height="48" width="48">
                    <p class="m-0 d-inline-block align-middle font-16">
                        <a href=""
                            class="text-body">{{$list->name}}</a>
                        <br>
                        {{-- <span class="text-warning mdi mdi-star"></span>
                        <span class="text-warning mdi mdi-star"></span>
                        <span class="text-warning mdi mdi-star"></span>
                        <span class="text-warning mdi mdi-star"></span>
                        <span class="text-warning mdi mdi-star"></span> --}}
                    </p>
                </td>
                <td>
                    {{$list->adno}}
    
                </td>
                <td>
                  
                    {{$list->id}}
                </td>
                <td>
                    {{$list->time}}
                </td>
    
                <td>
                    {{$list->internet}}
                </td>
                <td>
                    USTHAD
                </td>
                <td>
                    @if ($list->status==='REGISTERED')

                  <form method="POST" action="{{route('makeVerify',$list->id)}}" id="addForm">
                      @csrf
                      <input type="hidden" value="LEFT" name="status" id="">
                      <input type="hidden" value="{{ Auth::user()->name }}" name="admittedby">    
                     <input type="hidden"  value="<?php echo date('Y-m-d\TH:i:s'); ?>" name="admittime">
                      <button type="submit" class="btn btn-success">Admit</button>
  
                  </form>
                      
                  @else
                  <form method="POST" action="{{route('makeLeft',$list->id)}}" id="addForm">
                      @csrf
                      <input type="hidden" value="LEFT" name="status" id="">
                      <input type="hidden" value="{{ Auth::user()->name }}" name="leftedby">    
                      <button type="submit" class="btn btn-danger">Left</button>
                  </form>
                        
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


    <div id="openAddForm" hidden>
        <span class="helper"></span>
        <div>
            <div class="rightbar-title title">
                <h5 class="m-0">Add New</h5>
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon close-icon" onclick="closeForm()"></i>
                </a>

            </div>

    
        </div>
    </div>



@endsection
