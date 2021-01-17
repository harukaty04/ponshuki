{{-- 銘柄、香りの評価、味の評価（★）、総合評価（★）、写真登録 --}}
    @csrf
    <div class="md-form">
        <label class="wf-mplus1p pl-5">日本酒名</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
    </div>

    <div class="nihonshu-image pl-5">
        <label class="nihonshu-image  wf-mplus1p">画像</label>
        <input type="file" name="image" accept="image/jpeg, image/png"  class=" pt-3 pl-5">
    </div>


    <div class="taste-ev ">
        <label class="taste-evl pl-5 wf-mplus1p">味の濃さ</label>
        <div class="ratebutton ml-5 pl-5">
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="taste_intensity" value="1">
                <label for="1">1</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="taste_intensity" value="2">
                <label for="2">2</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="taste_intensity" value="3" checked>
                <label for="3">3</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="taste_intensity" value="4">
                <label for="4">4</label>
            </div>
            <div class="md-radio md-radio-inline d-inline">
                <input type="radio" name="taste_intensity" value="5">
                <label for="5">5</label>
            </div>
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
        
        <textarea name="content" required class="form-control wf-mplus1p" rows="4" placeholder="メモ">{{ old('body') }}</textarea>
    </div>

    {{----- 練習 -----}}