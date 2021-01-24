<form action="{{ route('review.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <div id=""></div>
    <button type="submit" class="">submit</button>
</form> 
