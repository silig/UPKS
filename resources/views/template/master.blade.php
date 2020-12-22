<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.partials._head')

  <!-- =======================================================
    Theme Name: Plato
    Theme URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  <header>

    <!-- Navbar
    ================================================== -->
    @include('template.partials._navbar')
  </header>
  
      @stack('intro')
    
      @stack('subintro')
  <section id="maincontent">
      <div class="container">
        @yield('content')
      </div>
  </section>
  <!-- Footer
 ================================================== -->
  <footer class="footer">
    @include('template.partials._footer')
  </footer>

@include('template.partials._scripts')

</body>

</html>
