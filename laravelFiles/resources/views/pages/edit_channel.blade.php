<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4 d-inline">Update Channel : {{$channel['name']}}</h4>
        <form action="{{url('update-channel-exe')}}" id="updateChannelForm" method="post">
            @csrf
            <input type="hidden" name="channel_id" value="{{$channel['id']}}">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="{{$channel['name']}}"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">YouTube Id</label>
                <input
                    type="text"
                    class="form-control"
                    name="yt_id"
                    id="yt_id"
                    value="{{$channel['yt_id']}}"
                />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Select Manager</label>
                <select
                    class="form-select"
                    name="manager"
                    id=""
                >
                    <option selected value="0">No Manager</option>

                    @foreach($managers as $manager)

                    <option value="{{$manager['id']}}"
                    @if($channel['manager']==$manager['id'])
                    selected
                    @endif
                    >{{$manager['name']}}</option>

                    @endforeach
                    
                </select>
            </div>
            
            <button type="submit" class="btn btn-success d-block btn-lg">Update</button>
            
        </form>
    </div>
</main>

<script>
    $("form#updateChannelForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function (response) {
                if (response.result=="success") {
                    $("span#success-toast-message").html("Channel updated successfully");
                    $(".success-toast").toast("show");
                } else {
                    $("span#failure-toast-message").html(response.message);
                    $(".failure-toast").toast("show");
                }
            }
        });
    });
</script>