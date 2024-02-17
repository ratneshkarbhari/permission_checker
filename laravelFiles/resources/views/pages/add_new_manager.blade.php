<main class="page-container col-md-9 col-lg-10 mt-4">
    <div class="container-fluid">

        <h1 class="page-title">{{$title}}</h1>

        <form enctype="multipart/form-data" action="{{ url('create-manager-exe') }}" id="createManagerForm" method="post">

            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id=""
                />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id=""
                />
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Group Code</label>
                <input
                    type="text"
                    class="form-control"
                    name="group_code"
                    id=""
                />
            </div>

            
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="1"
                    id=""
                    name="is_gm"
                />
                <label class="form-check-label" for=""> Is Group Manager? </label>
            </div>

            <button type="submit" class="btn btn-success d-block mt-4">Create New</button>
            

        </form>
    </div>
</main>

<script>
    $("form#createManagerForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serializeArray();
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function(response) {
                if (response.result == "success") {
                    $("span#success-toast-message").html("Manager Created");
                    $(".success-toast").toast("show");
                } else {
                    $("span#failure-toast-message").html(response.message);
                    $(".failure-toast").toast("show");
                }
            }
        });
    });
</script>