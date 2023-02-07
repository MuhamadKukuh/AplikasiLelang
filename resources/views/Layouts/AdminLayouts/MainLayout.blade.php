<!DOCTYPE html>
<html lang="en">
<head>
  @include('Layouts.AdminLayouts.Head')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('Components.AdminComponents.Navbar')
  @include('Components.AdminComponents.Sidebar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    @include('Components.AdminComponents.Header')
    <!-- Main content -->
    <section class="content">
      @yield('ItemPreview')
      <div class="container-fluid">
        <!-- Info boxes -->
        @yield('AdminContent')
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('Components.AdminComponents.Footer')
</div>
@include('Layouts.AdminLayouts.JavaScript')
</body>
</html>
