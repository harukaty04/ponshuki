
<nav class="my-navbar blue-gradient px-3">
    <a class="my-navbar-brand text-dark" href="/">
    <i class="fas fa-wine-glass-alt"></i>
        ponshuki</a>

    <div class="my-navbar-control text-white">
        <span class="my-navbar-item">ようこそ, 
            <a href=/mypage>haruka</a>さん
                {{-- ドロップダウンボタンの実装 --}}
                <a class="dropdown-toggle head_push" data-toggle="dropdown" href="#">
                </a>
                <ul class="dropdown-menu">
                    {{-- ログアウトボタンの実装 --}}
                    <a class="doropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>    
                    </a>
                </ul> 
        </span>
    </div>
</nav>
