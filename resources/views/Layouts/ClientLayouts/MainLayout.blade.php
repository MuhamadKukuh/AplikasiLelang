<!DOCTYPE html>
<html lang="en">

<head>
  @include('Layouts.ClientLayouts.Head')
</head>

<body>

  @include('Components.ClientComponents.Navbar')

  <!-- ======= Hero Section ======= -->
  @yield('ClientContent')

  @include('Components.ClientComponents.Footer')

  <!-- Vendor JS Files -->
  @include('Layouts.ClientLayouts.JavaScript')
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

</body>

</html>