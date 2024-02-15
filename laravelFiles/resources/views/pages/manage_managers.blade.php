<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4">Manage Managers</h4>
        <div class="table-responsive">
            <table class="table DataTable bordered ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Group Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managers as $manager)
                    <tr>
                        <td>{{$manager["name"]}}</td>
                        <td>{{$manager["email"]}}</td>
                        <td>{{$manager["group_code"]}}</td>

                        <td>
                            <a href="{{url('edit-title/'.$manager['id'])}}" class="btn btn-secondary">Edit</a>
                        </td>
                        
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>