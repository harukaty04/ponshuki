{{-- 銘柄、香りの評価、味の評価（★）、総合評価（★）、写真登録 --}}
    @csrf
    <div class="md-form">
        <label>日本酒名</label>
        <input type="text" name="review-title" class="form-control" required value="{{ old('title') }}">
    </div>

    <div class="nihonshu-image pl-5">
        <label class="nihonshu-image  ">画像</label>
        <input type="file" name="review-image" accept="image/jpeg, image/png"  class="mx-auto pt-3">
    </div>


    <div class="taste-ev ">
        <label class="taste-evl pl-5">味の濃さ</label>
        <div class="ratebutton text-center">
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g1" value="1">
                <label for="1">1</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g1" value="2">
                <label for="2">2</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g1" value="3" checked>
                <label for="3">3</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g1" value="4">
                <label for="4">4</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g1" value="5">
                <label for="5">5</label>
            </div>
        </div>
    </div>


    <div class="scent-evl">
        <label class="taste-evl pl-5">香りの強さ</label>
        <div class="ratebutton text-center">
                <div class="md-radio md-radio-inline d-inline">
                <input  type="radio" name="g2" checked>
                <label for="1">1</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g2" checked>
                <label for="2">2</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g2" checked>
                <label for="3">3</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="g2">
                <label for="4">4</label>
                </div>
                <div class="md-radio md-radio-inline d-inline">
                <input  type="radio" name="g2">
                <label for="5">5</label>
                </div>
        </div>
    </div>


    <div class="comp-evl">
        <label class="taste-evl pl-5">総合評価</label>
        <div class="ratebutton text-center">
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="g3" checked>
            <label for="1">1</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input type="radio" name="g3" checked>
            <label for="2">2</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="g3" checked>
            <label for="3">3</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input type="radio" name="g3">
            <label for="4">4</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
            <input  type="radio" name="g3">
            <label for="5">5</label>
            </div>
    </div>
    </div>

    <div class="form-group">
        <label></label>
        <textarea name="body" required class="form-control" rows="4" placeholder="メモ">{{ old('body') }}</textarea>
    </div>
