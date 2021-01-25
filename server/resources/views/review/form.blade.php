{{-- 銘柄、香りの評価、味の評価（★）、総合評価（★）、写真登録 --}}
    @csrf
    <div class="md-form">
        <label class="wf-mplus1p pl-5">日本酒名</label>
        <input type="hidden" name="id" value={{ $review->id ?? '' }}>
        <input type="text" name="title" class="form-control" required value="{{ $review->title ?? old('title') }}">
    </div>

    <div class="nihonshu-image pl-5">
            <label class="nihonshu-image">画像</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png"  class="pt-3 pl-5">
            <iframe name="form_response" style="display:none;" ></iframe>
    </div>
    
    <div class="taste-ev ">
        <label class="taste-evl pl-5 wf-mplus1p">味の濃さ</label>
        <div class="ratebutton ml-5 pl-5">

            @for ($i = 1; $i <= 5; $i++)
                @if(empty($review))
                    @if( $i === 3 )
                        <div class="md-radio md-radio-inline d-inline">
                            <input type="radio" name="taste_intensity" value="{{ $i }}" checked>
                            <label for="{{ $i }}">{{ $i }}</label>
                        </div>
                    @else
                        <div class="md-radio md-radio-inline d-inline">
                            <input type="radio" name="taste_intensity" value="{{ $i }}">
                            <label for="{{ $i }}">{{ $i }}</label>
                        </div>
                    @endif
                @else
                    @if( $i === $review->taste_intensity )
                        <div class="md-radio md-radio-inline d-inline">
                            <input type="radio" name="taste_intensity" value="{{ $i }}" checked>
                            <label for="{{ $i }}">{{ $i }}</label>
                        </div>
                    @else
                        <div class="md-radio md-radio-inline d-inline">
                            <input type="radio" name="taste_intensity" value="{{ $i }}">
                            <label for="{{ $i }}">{{ $i }}</label>
                        </div>
                    @endif
                @endif
            @endfor
        </div>
    </div>


    <div class="scent-evl">
        <label class="taste-evl pl-5 wf-mplus1p">香りの強さ</label>
        <div class="ratebutton ml-5 pl-5">
                <div class="md-radio md-radio-inline d-inline">
                <input  type="radio" name="scent_strength" value="1" >
                <label for="1">1</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="scent_strength" value="2" >
                <label for="2">2</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="scent_strength" value="3" checked>
                <label for="3">3</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="scent_strength" value="4">
                <label for="4">4</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input  type="radio" name="scent_strength" value="5">
                <label for="5">5</label>
                </div>
        </div>
    </div>


    <div class="comp-evl">
        <label class="taste-evl pl-5 wf-mplus1p">総合評価</label>
        <div class="ratebutton ml-5 pl-5">
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="evaluation" value="1">
            <label for="1">1</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input type="radio" name="evaluation" value="2">
            <label for="2">2</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="evaluation" value="3" checked>
            <label for="3">3</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input type="radio" name="evaluation" value="4">
            <label for="4">4</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="evaluation" value="5">
            <label for="5">5</label>
            </div>
    </div>
    </div>

    <div class="form-group pt-4">
        
        <textarea name="content" required class="form-control wf-mplus1p" rows="4" placeholder="詳細">{{ $review->content ?? old('body') }}</textarea>
    </div>
