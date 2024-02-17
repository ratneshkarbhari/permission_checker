<main class="page-container col-md-9 col-lg-10 mt-4">
    <div class="container-fluid">

        <h1 class="page-title">{{$title}}</h1>

        <form enctype="multipart/form-data" action="{{ url('create-title-exe') }}" id="createTitleForm" method="post">

            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Cast</label>
                <textarea rows="8" name="cast" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Year Of Release</label>
                <input type="text" class="form-control" name="yor" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Language</label>
                <input type="text" class="form-control" name="language" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lot</label>
                <input type="text" class="form-control" name="lot"  />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Grading</label>
                <input type="text" class="form-control" name="grading" />
            </div>
            <h5>Rights we have : </h5>
            <div class="form-check form-check-inline">
                <input name="full_movie" class="form-check-input" type="checkbox" id="" value="YES"  />
                <label class="form-check-label" for="">Full Movie</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="scene" class="form-check-input" type="checkbox" id="" value="YES"  />
                <label class="form-check-label" for="">Scene</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="song" class="form-check-input" type="checkbox" id="" value="YES"  />
                <label class="form-check-label" for="">Song</label>
            </div>

            <h5 style="margin: 1em 0;">Channels to have rights:</h5>
            <div class="row m-0">
                @foreach($channels as $channel)

                <div class="form-check form-check-inline col-md-3 m-0 mb-2">
                    <input name="channels[]" class="form-check-input" type="checkbox" value="{{$channel['id']}}"  />
                    <label class="form-check-label" for="">{{$channel['name']}}</label>
                </div>

                @endforeach
            </div>


            <button type="submit" class="btn btn-lg w-100 btn-success  " style="margin: 2em 0;">Create New</button>

        </form>



    </div>
</main>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
    <div id="liveToast " class="toast bg-success text-white title-create-success position-relative fade hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>

        </div>
        <div class="toast-body">
            Title created successfully
        </div>
        <div class="toast-timeline animate"></div>
    </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
    <div id="liveToast " class="toast hide bg-danger text-white title-create-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
            <small>Just Now</small>

        </div>
        <div class="toast-body">

            Title create failed

        </div>
        <div class="toast-timeline animate"></div>
    </div>
</div>
<script>
    $("form#createTitleForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serializeArray();
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function (response) {
                if(response.result=="success"){


                    $(".title-create-success").toast("show");
                    

                }else{
                    $(".title-create-failure").toast("show");
                }
            }
        });
    });
</script>