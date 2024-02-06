<main class="page-container col-md-9 col-lg-10 mt-5">
    <div class="row">
        @foreach($channels as $channel)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{url('see-titles/'.$channel['id'])}}" class="text-decoration-none">
                <div class="card text-center">
                    <h4 class="card-body mb-0 ">{{$channel["name"]}}</h4>
                </div>
                
            </a>
        </div>
        @endforeach
    </div>
</main>