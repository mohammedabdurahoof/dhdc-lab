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
                                <form method="POST" action="{{ route('addNetcash') }}" id="addForm">
                                    @csrf
                                  
                                <button type="sumbit" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i>Refresh </button>
                            </form>
                           
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end" style="display: flex;
                                justify-content: flex-end;">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                            <a href="javascript:window.net()" class="btn btn-light mb-2"><i class="mdi mdi-neter"></i> net</a>


                                    <form action="" method="post">
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
    @foreach ($labusage as $labusage)
        <tr>
           
            <td>
              1
          </td>
          <td>
            {{$labusage->adno}}
      </td>
          <td>
            {{$labusage->status}}
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



@endsection
