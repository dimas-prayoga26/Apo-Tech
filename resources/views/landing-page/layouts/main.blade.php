<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Apo-Tech')</title>
  <!-- Import file CSS Bootstrap -->
  {{-- <link rel="stylesheet" href="{{ asset('assets-ui/style.css') }}"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-cYrNjLb6U5Sw6U11aMR7FWRL0jlvTV15zJd1gpXG1ZVGLjv0Jez7VszSXfA8DW7oOgjeBVqGxqQJ9XrBOfjU1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets-ui/fontawesome/css/all.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('assets-ui/.css') }}"> --}}
  @yield('css')

</head>
<body class="defult-landing-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-color">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="margin-right: 150px; margin-left: 50px">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item mr-5 mt-1">
            <a class="nav-link active" aria-current="page" href="#" style="margin-right: 100px"><i class="fas fa-home me-2"></i>Beranda</a>
          </li>
          <li class="nav-item mt-2">
            <form class="d-flex">
              <input style="width: 300px" class="form-control me-2" type="search" placeholder="Cari" aria-label="Cari" />
              <button class="btn btn-outline-info btn-outline-dark" type="submit"><i class="fas fa-solid fa-magnifying-glass"></i></button>
            </form>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto" style="margin-right: 50px">
          <li class="nav-item ms-lg-5" style="margin-right: -25px">
            <a class="nav-link" href="#"><button class="btn btn-outline-info btn-outline-dark"><i class="fas fa-basket-shopping"></i></button></a>
          </li>
          <li class="nav-item ms-lg-5" style="margin-right: 50px">
            <a class="nav-link" href="#"
              ><button class="btn btn-outline-info btn-outline-dark"><i class="fa-sharp fa-regular fa-bell"></i></button
            ></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button class="btn btn-outline-info btn-outline-dark"><i class="fas fa-user me-2"></i>Login</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="main-content">
        @yield('content')
    </div>
        @include('landing-page.layouts.footer')
        <script src="{{ asset('landingpage/js/modernizr-2.8.3.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/jquery.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/jquery.nav.js') }}"></script>
        <script src="{{ asset('landingpage/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/paralax.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/swiper.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/time-circle.js') }}"></script>
        <script src="{{ asset('landingpage/js/skill.bars.jquery.js') }}"></script>
        <script src="{{ asset('landingpage/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('landingpage/js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ asset('landingpage/js/main.js') }}"></script>
        <script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>
        <script src="{{ asset('assets/plugins/notify/js/sample.js') }}"></script>
        <script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>
        <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        @yield('script')
</body>

</html