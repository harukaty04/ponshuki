<div class="menu mt-3" >
    <div class="menu-title text-info h1">

        <div class="p-3 sidebar-hover">
            <a class="side-bar-link font-allegra" href="/" >
                <i class="fas fa-home fa-lg pr-3"></i> Home
            </a>
        </div>

        <div class="p-3 sidebar-hover">
            <a class="side-bar-link font-allegra" href="/search" >
                <i class="fas fa-search fa-lg pr-3"></i> Search
            </a>
        </div>

        <div class="p-3 sidebar-hover">
            <a class="side-bar-link font-allegra" href="{{ route( 'user.profile') }} " >
                <i class="fas fa-user-alt fa-lg pr-3"></i> Profile
            </a>
        </div>

        <div class="p-3 sidebar-hover">
            <a class="side-bar-link font-allegra" href="{{ route('user.likes')}}" >
                <i class="far fa-heart fa-lg pr-3"></i> Likes
            </a>
        </div>
    </div>
</div>
