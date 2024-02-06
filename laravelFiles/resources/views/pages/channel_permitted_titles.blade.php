<main class="page-content col-md-9 col-lg-10 mt-5">
  <div class="container">
    <h4 class="heading-1 mb-4">Titles for channel</h4>
    <div class="table-responsive">
  <table class="table DataTable bordered ">
  <thead>
    <tr>
        <th>Title</th>
        <th>Full Movie</th>
        <th>Scene</th>
        <th>Song</th>
        <th>Grading</th>
        <th>Lot</th>
        <th>Cast</th>
        <th>Year Of Release</th>
    </tr>

  </thead>
  <tbody>
  
    @foreach($allowed_titles as $allowed_title)
   
    <tr>
        <td>{{$allowed_title["name"]}}</td>
        <td>{{$allowed_title["full_movie"]}}</td>
        <td>{{$allowed_title["scene"]}}</td>
        <td>{{$allowed_title["song"]}}</td>
        <td>{{$allowed_title["grading"]}}</td>
        <td>{{$allowed_title["lot"]}}</td>
        <td>{{$allowed_title["cast"]}}</td>
        <td>{{$allowed_title["yor"]}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
  </div>
</main>