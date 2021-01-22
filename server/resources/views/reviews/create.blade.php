

<div class="pr-3">

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">
                <form action="{{ route('top.create') }}" method="post">
                    @include('reviews.form')
                    <button type="submit" class="btn blue-gradient float-right wf-mplus1p">投稿する</button>
                </form>

                
            </div>
        </div>
    </div>


    {{-- test --}}
    @foreach($reviews as $review)
    <div class="card mt-5 mb-3">
        
        <div class="card-body">
            <a class="h4 " href="{{ route('users.profile',['id' => $review->user->id]) }} "><i class="fas fa-user-circle pr-2"></i>
                {{ $review->user->name }}さん</a>
            <a class="edit-bun btn  btn-outline-info btn-sm float-right" href="{{ route('reviews.edit',['id' => $review->id]) }}">編集</a>
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