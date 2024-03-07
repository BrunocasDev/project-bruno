<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid text-white">
        <a class="navbar-brand text-white" href="{{ route('contacts') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('login') ? 'active' : '' }}" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li> 
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-white"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
