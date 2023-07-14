<!doctype html>
<html lang="en" data-bs-theme="auto">
  {{-- <head><script src="../assets/js/color-modes.js"></script> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Butterfly Exam</title>
    <link rel="shortcut icon" href="https://untirta.ac.id/wp-content/uploads/2020/01/Untirta-Logo-Transparan.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
  </head>
  <body>

<header class="navbar sticky-top flex-md-nowrap p-0 bg-white-blue">
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list text-light"></i>
      </button>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">

    {{-- Sidebar --}}
    @include('partials.sidebar')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5 bg-dark-blue min-vh-100">
        {{-- Content --}}
        @yield('content')
    </main>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{asset('/js/script.js')}}"></script></body>
    @yield('js')
</html>
