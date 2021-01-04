<div class="container">
    <div class="row">
        <div class="col-8 ">
            <div class="card mt-3 mr-5">
            <div class="card-body pt-0">
                <div class="card-text">
                    @include('reviews.form')
                    <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- test --}}
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <div class="card mt-3 mr-5">
            <div class="card-body pt-0">
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
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 ">
            <div class="card mt-3 mr-5">
            <div class="card-body pt-0">
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
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 ">
            <div class="card mt-3 mr-5">
            <div class="card-body pt-0">
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
    </div>
</div>
