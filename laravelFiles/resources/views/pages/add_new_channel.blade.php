<main class="page-content col-md-9 col-lg-10 mt-5">
    <div class="container-fluid">
        <h4 class="heading-1 mb-4 d-inline">Add New Channel</h4>
        <form action="{{url('create-new-channel-exe')}}" id="createNewChannelForm" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">YouTube Id</label>
                <input
                    type="text"
                    class="form-control"
                    name="yt_id"
                    id="yt_id"
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

                    <option value="{{$manager['id']}}">{{$manager['name']}}</option>

                    @endforeach
                    
                </select>
            </div>
            
            <button type="submit" class="btn btn-success d-block btn-lg">Create New</button>
            
        </form>
    </div>
</main>

<script>
    $("form#createNewChannelForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function (response) {
                console.log(response);
                if (response.result=="success") {
                    $("span#success-toast-message").html("Channel created successfully");
                    $(".success-toast").toast("show");
                } else {
                    $("span#failure-toast-message").html(response.message);
                    $(".failure-toast").toast("show");
                }
            }
        });
    });
</script>