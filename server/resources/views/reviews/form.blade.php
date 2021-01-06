{{-- 銘柄、香りの評価、味の評価（★）、総合評価（★）、写真登録 --}}

@csrf
<div class="md-form">
    <label>日本酒名</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
</div>
<div class="nihonshu-image">
    <label>画像</label>

</div>
<div class="taste-evl">
    <label>味の濃さ</label>

</div>
<div class="scent-evl">
    <label>香りの強さ</label>

</div>
<div class="comp-evl">
    <label>総合評価</label>

</div>

<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="4" placeholder="メモ">{{ old('body') }}</textarea>
</div>
