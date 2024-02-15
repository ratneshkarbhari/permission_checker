<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4">Manage titles</h4>
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
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach($titles as $title)
                    <tr>
                        <td>{{$title["name"]}}</td>
                        

                        <td><span style="padding: 0.3em;" class="@if($title['full_movie']=='YES') bg-success @else bg-danger @endif">{{$title["full_movie"]}}</span></td>


                        <td><span style="padding: 0.3em;" class="@if($title['scene']=='YES') bg-success @else bg-danger @endif">{{$title["scene"]}}</span></td>
                        
                        <td><span style="padding: 0.3em;" class="@if($title['song']=='YES') bg-success @else bg-danger @endif">{{$title["song"]}}</span></td>
                        
                        <td>{{$title["grading"]}}</td>
                        <td>{{$title["lot"]}}</td>
                        <td>{{$title["cast"]}}</td>
                        <td>{{$title["yor"]}}</td>
                        <td>
                            <a href="{{url('edit-title/'.$title['id'])}}" class="btn btn-secondary">Edit</a>
                            <form class="d-inline" action="" method="post">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</main>