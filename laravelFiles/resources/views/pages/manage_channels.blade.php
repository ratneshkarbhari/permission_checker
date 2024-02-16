<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4 d-inline">Manage Channels</h4>
        <a href="{{url('add-new-channel')}}" class="btn btn-success">+</a>
        <div class="table-responsive">
            <table class="table DataTable bordered ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>YouTube Id</th>
                        <th>Manager</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach($channels as $channel)
                    <tr>
                        <td>{{$channel["name"]}}</td>
                        <td>{{$channel["yt_id"]}}</td>
                        <td><a href="{{url('manager-details/'.$channel['manager_data']['id'])}}">{{$channel["manager_data"]["name"]}}</a></td>
                        <td>
                            <a href="{{url('edit-channel/'.$channel['id'])}}" class="btn btn-secondary">Edit</a>
                            <!-- <form class="d-inline" action="" method="post">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</main>