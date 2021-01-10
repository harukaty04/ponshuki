
{{-- <form action="POST">
    @csrf
    <input type="text">
    <button>投稿する</button>
</form> --}}

<div class="pr-3">

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">
                <form action="{{ route('top.create') }}" method="post">
                    @include('reviews.form')
                    <button type="submit" class="btn blue-gradient float-right">投稿する</button>
                    {{-- @if($errors->any())
                    @endif --}}
                </form>

                
            </div>
        </div>
    </div>


    {{-- test --}}

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">

                <div class="md-form">
                    <label>写楽</label>
                    <input type="text" name="title" class="form-control" required value="">
                </div>
                <div class="form-group">
                    <label></label>
                    <textarea name="body" required class="form-control" rows="8" placeholder="メモ">{{ old('body') }}</textarea>
                </div>

            </div>
        </div>
    </div>



    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">
                
                <div class="md-form">
                    <label>写楽
                    </label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label></label>
                    <textarea name="body" required class="form-control" rows="8" placeholder="メモ">{{ old('body') }}</textarea>
                </div>

            </div>
        </div>
    </div>



    <div class="card mt-3">
        <div class="card-body">
            <div class="card-text">
                
                <div class="md-form">
                    <label>写楽
                    </label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label></label>
                    <textarea name="body" required class="form-control" rows="8" placeholder="メモ">{{ old('body') }}</textarea>
                </div>
            </div>
        </div>
    </div>

</div>