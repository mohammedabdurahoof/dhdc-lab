@extends('dashboard/partials/layout')

@section('footer')

<!-- Begin page -->
<div class="wrapper">
    @yield('left-bar')
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     Copyright ©<script>
                        document.write(new Date().getFullYear())
                    </script> DHDC Computer Lab. All rights reserved | Powered by DHDC Media Wing
                </div>
                {{-- <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-md-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- END wrapper -->
@endsection