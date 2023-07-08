<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Butterfly Exam</title>
    <link rel="shortcut icon" href="https://untirta.ac.id/wp-content/uploads/2020/01/Untirta-Logo-Transparan.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  </head>
  <body id="particles-js" class="{{Request::is('pelajar*') ? 'bg-primary' : 'backgroundIndex' }}">

    <header class="no-background">
      @include('partials.navbar')
    </header>

    <main class="containers fluid position-relative top-0">
      @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/particles/particles.js') }}"></script>
    <script src="{{ asset('vendor/particles/app.js') }}"></script>
    @yield('js')
  </body>
</html>