<main class="page-container col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h3 style="margin-bottom: 2em;">Welcome {{ session('name') }}</h3>
        @if(session("is_gm"))
        <p>Your own and your group member channels are below. Where your channels are marked in green.</p>
        @endif
        <div class="row">
            @foreach($channels as $channel)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{url('see-titles/'.$channel['id'])}}" class="text-decoration-none">
                    <div class="card mb-3 text-center
                    @if(session('is_gm'))
                    @if($channel['manager'] == session('manager_id'))
                    bg-success
                    @endif
                    @endif
                    ">
                    <div class="card-body">
                        <h4 class="mb-0">{{$channel["name"]}}</h4>
                        @if($channel['manager'] != session('manager_id'))
                        <small>{{$channel['manager_name']}}</small>
                        @endif
                    </div>
                    </div>
                    
                </a>
            </div>
            @endforeach
        </div>
    </div>
</main>