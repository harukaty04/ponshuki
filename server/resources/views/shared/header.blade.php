
<nav class="my-navbar blue-gradient p-side-origin">
    <a class="my-navbar-brand  pl-5 page-title" href="/">
        <i class="fas fa-wine-glass-alt "></i>
        ponshuki
    </a>

    <div class="my-navbar-control text-white">
        @if(Auth::check())
        <span class="my-navbar-item">
            <a class="h6" href=# ><i class="fas fa-user-circle pr-2"></i>{{ Auth::user()->name }} さん</a>
                {{-- ドロップダウンボタンの実装 --}}
                <a class="dropdown-toggle head_push " data-toggle="dropdown" href="#">
                </a>
                <ul class="dropdown-menu text-center bg-light">
                {{-- ログアウトボタンの実装 --}}
                <a class="doropdown-item " href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>  
                    @else
                    <div class="loginbtn">
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill  mb-2">ログイン</a>
                    <a href="{{ route('register') }}" type="button" class="btn btn-primary rounded-pill  mb-2">会員登録</a>
                    <a href="{{ route('login.guest') }}" type="button" class="btn btn-outline-light rounded-pull mb-2">簡単ログイン</a>
                    
                    </div>
                    @endif
                </a>
                </ul> 
        </span>
    </div>
</nav>
