<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{{ URL::asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}}">
    <link rel="stylesheet" href="{{{ URL::asset('admin/assets/vendors/css/vendor.bundle.base.css') }}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{{ URL::asset('admin/assets/css/style.css') }}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{{ URL::asset('admin/assets/images/favicon.ico') }}}" />
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      @include('partials.admin.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('partials.admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">@yield('content')</div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('partials.admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{{ URL::asset('admin/assets/vendors/js/vendor.bundle.base.js') }}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{{ URL::asset('admin/assets/vendors/chart.js/Chart.min.js') }}}"></script>
    <script src="{{{ URL::asset('admin/assets/js/jquery.cookie.js') }}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{{ URL::asset('admin/assets/js/off-canvas.js') }}}"></script>
    <script src="{{{ URL::asset('admin/assets/js/hoverable-collapse.js') }}}"></script>
    <script src="{{{ URL::asset('admin/assets/js/misc.js') }}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{{ URL::asset('admin/assets/js/dashboard.js') }}}"></script>
    <script src="{{{ URL::asset('admin/assets/js/todolist.js') }}}"></script>
    
    <!-- End custom js for this page -->
  </body>
</html>