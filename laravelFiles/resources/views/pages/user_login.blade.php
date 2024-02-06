<main class="page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <h2 class="text-center">User Login</h2>
                <p class="text-danger text-center" id="failureMessage"></p>

                <form id="userLoginForm" action="{{url('user-login-exe')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                        <small id="emailHelpId" class="form-text text-muted">Your Ultraindia Email</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="" placeholder="" />
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="" id="" class="btn btn-success">
                            Login
                        </button>
                    </div>

                </form>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>

</main>


<style>
    header,
    .sidebar {
        display: none !important;
    }
</style>

<script>

    $("form#userLoginForm").submit(function (e) { 
        e.preventDefault();
        let actionUrl = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: method,
            url: actionUrl,
            data: formData,
            success: function (response) {
                if(response.result=="failure"){

                    let failureMessage = response.message;

                    $("p#failureMessage").html(response.message);

                }else{
                   
                    $("p#failureMessage").html("");

                    window.location.replace("{{url('/')}}");


                }
            }
        });
    });

</script>