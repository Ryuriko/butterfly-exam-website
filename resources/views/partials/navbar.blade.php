<nav class="navbar navbar-dark navbar-expand-lg ps-3 pt-4 pt-md-2" style="z-index: 100;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('profile') ? 'text-warning' : 'text-light'}} fw-bold fs-5" href="/profile"><i class="bi bi-person-circle"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold fs-5" href="/logout"><i class="bi bi-arrow-right-circle"></i> Log Out</a>
                    </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-light {{Request::is('/') ? 'border border-light rounded-pill px-3' : ''}} fw-bold fs-5" href="/"> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{Request::is('registration') ? 'border border-light rounded-pill px-3' : 'text-light'}} fw-bold fs-5" href="/registration"> Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{Request::is('about') ? 'border border-light rounded-pill px-3' : 'text-light'}} fw-bold fs-5" href="#"> About</a>
                </li>
            @endauth
            <hr class"text-light">
        </ul>
        </div>
    </div>
</nav>