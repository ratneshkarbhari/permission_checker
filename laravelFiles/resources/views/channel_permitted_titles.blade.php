<table>
  <thead>
    <tr>
        <th>Title</th>
        <th>Full Movie</th>
        <th>Scene</th>
        <th>Song</th>
    </tr>

  </thead>
  <tbody>
  
    @foreach($titles as $title)
   
    <tr>
        <td>{{$title["name"]}}</td>
        <td>{{$title["full_movie"]}}</td>
        <td>{{$title["scene"]}}</td>
        <td>{{$title["song"]}}</td>
    </tr>
    @endforeach
  </tbody>
</table>