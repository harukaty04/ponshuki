
<nav class="my-navbar blue-gradient p-side-origin">
    <a class="my-navbar-brand  pl-4 page-title" href="{{ route( 'top.index' ) }} ">
        <i class="fas fa-wine-glass-alt "></i>
        ponshuki
    </a>

    <div class="my-navbar-control text-white">
        @if(Auth::check())
        
                <!-- Dropdown -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle pr-2"></i>{{ Auth::user()->name }} さん
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary btn-light text-center" aria-labelledby="navbarDropdownMenuLink">
                    <button form="logout-button" class="dropdown-item" type="submit">
                        ログアウト
                    </button>
                    </div>
                </div>
                <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                <!-- Dropdown -->
        @else
                <div class="loginbtn">
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill  mb-2">ログイン</a>
                    <a href="{{ route('register') }}" type="button" class="btn btn-primary rounded-pill  mb-2">会員登録</a>
                    <a href="{{ route('login.guest') }}" type="button" class="btn btn-outline-light rounded-pull mb-2">簡単ログイン</a>
                </div>
            </div>
        @endif
        
        
            
    </div>
</nav>
