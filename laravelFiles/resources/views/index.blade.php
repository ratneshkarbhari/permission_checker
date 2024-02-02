<form action="{{url('upload-data-exe')}}" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="rights_data" accept="csv">
    <button type="submit">upload</button>
</form>