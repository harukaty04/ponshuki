

<div class="pr-3">

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">
                <form action="{{ route('top.create') }}" method="post">
                    @include('review.form')
                    <button type="submit" class="btn blue-gradient float-right wf-mplus1p">投稿する</button>
                </form>

                
            </div>
        </div>
    </div>


    {{-- test --}}
    @foreach($reviews as $review)
    <div class="card mt-5 mb-3 ">
        <div class="card-body ">
            <a class="h4 " href="{{ route('user.profile',['id' => $review->user->id]) }} "><i class="fas fa-user-circle pr-2"></i>
                {{ $review->user->name }}さん</a>
                @if( $current_user_id === $review->user->id )
            {{--ログインユーザーの場合のみ編集ボタンを出現させる--}}
            <!-- dropdown -->
            <div class="ml-auto card-text  btn-sm float-right">
                <div class="dropdown">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button type="button" class="btn btn-link text-muted m-0 p-2">
                        <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-light">
                        <a class="dropdown-item bg-light" href="{{ route("review.edit", ['review' => $review]) }}">
                        <i class="fas fa-pen mr-1"></i>記事を更新する
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $review->id }}">
                        <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                        </a>
                    </div>
                </div>
            </div>
            <!-- dropdown -->
            
            <!-- modal -->
            <div id="modal-delete-{{ $review->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="post" action="{{ route('review.destroy') }}">
                        @csrf
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <div class="modal-body">
                            {{ $review->title }}を削除します。よろしいですか？
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a   class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                            <button type="submit" class="btn btn-danger" value="destroy">削除する</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- modal -->
            
            @endif
        <h5 class="card-title border-bottom "> {{ $review->title }}   :   {{ $review->evaluation}}</h5>      
        <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" />
        <span class="all-rating">
        味の濃さ  {{ $review->taste_intensity}} /香りの強さ  {{ $review->scent_strength}}
        </span>
        <p class="mt-3 ml-5 pl-5">{{ $review->content }}</p>
            <span class="badge badge-pill badge-light ">#爽酒</span>
        </div>
    </div>
    @endforeach
</div>