<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h1 class="page-title">Upload Monthly Data</h1>
        <form action="{{url('upload-data-exe')}}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="rights_data" accept="csv">
            <button type="submit">upload</button>
        </form>
    </div>
</main>