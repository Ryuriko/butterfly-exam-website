<div class="sidebar col-md-3 col-lg-2 p-0 bg-white-blue">
  <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column px-3 overflow-y-auto">
      <div class="text-center text-light">
        <img class="img-fluid mt-1" src="{{asset('/media/sidebar/logo.png')}}">
        <br>
        {{-- <img class="img-fluid mt-3" src="{{auth()->user()->picture}}"> --}}
	<img class="img-fluid mt-3" src="{{auth()->user()->picture !== Null ? asset('/storage/' . auth()->user()->picture) : 'https://cdn.pixabay.com/photo/2015/08/19/21/25/butterfly-896668_1280.png'}}">
        <h6 class="mt-3">Ahmad Khoirul Umam</h6>
        <p class="">Teacher</p>
        <a href="/profile/edit" class="border border-light rounded-5 mx-5 nav-link">Edit</a>
      </div>
      <ul class="nav flex-column mt-4">
        <li class="nav-item ">
          <a class="nav-link fw-bold text-light {{Request::is('pendidik*') ? 'bg-silver-transparant rounded-3' : 'text-light'}} {{Request::is('pelajar*') ? 'bg-silver-transparant rounded-3' : 'text-light'}}" href="{{auth()->user()->auth === 'pendidik' ? '/pendidik' : '/pelajar'}}">
            <i class="bi bi-grid-fill me-2"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-light {{Request::is('profile*') ? 'bg-silver-transparant rounded-3' : 'text-light'}}" href="/profile">
            <i class="bi bi-person-circle me-2"></i>
            Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-light {{Request::is('about*') ? 'bg-silver-transparant rounded-3' : 'text-light'}}" href="#">
            <i class="bi bi-info-circle-fill me-2"></i>
            About
          </a>
        </li>
      </ul>

      <ul class="nav flex-column mt-auto">
        <li class="nav-item">
          <a class="nav-link fw-bold text-light" href="/logout">
            <i class="bi bi-arrow-right-circle-fill me-2"></i>
            Log Out
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>