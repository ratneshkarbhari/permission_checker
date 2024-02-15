<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4 d-inline">Manage titles</h4>
        <a href="{{ url('add-new-title') }}" class="btn btn-success">+</a>
        <br><br>
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


                        <td><span style="padding: 0.3em;" class="@if($title['full_movie']=='YES') bg-success @else bg-danger @endif">
                        @if($title["full_movie"]){{$title["full_movie"]}} @else NO @endif</span></td>


                        <td><span style="padding: 0.3em;" class="@if($title['scene']=='YES') bg-success @else bg-danger @endif">@if($title["scene"]){{$title["scene"]}} @else NO @endif</span></td>

                        <td><span style="padding: 0.3em;" class="@if($title['song']=='YES') bg-success @else bg-danger @endif">@if($title["song"]){{$title["song"]}} @else NO @endif</span></td>

                        <td>{{$title["grading"]}}</td>
                        <td>{{$title["lot"]}}</td>
                        <td>{{$title["cast"]}}</td>
                        <td>{{$title["yor"]}}</td>
                        <td>
                            <a href="{{url('edit-title/'.$title['id'])}}" class="btn btn-secondary">Edit</a>
                        </td>
                    </tr>
                    @endforeach



                

                </tbody>

            </table>
        </div>
    </div>
</main>