{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FatTech Register Page</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin-assets/css/custom.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        @include('admin.message')
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h3">Admin login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="post" name="adminRegistrationForm" id="adminRegistrationForm">
                    @csrf
                    <h4 class="modal-title">Register Now</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                            id="password_confirmation" name="password_confirmation">
                        <p></p>
                    </div>
                    <div class="form-group small">
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Register</button>
                </form>
                <div class="text-center small mt-1">Already have an account? <a href="{{ route('admin.login') }}">Login Now</a></div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin-assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin-assets/js/demo.js"></script>
</body>

<script type="text/javascript">
    $("#adminRegistrationForm").submit(function(event) {

        event.preventDefault();

        $("button[type=submit]").prop("disabled", true);

        $.ajax({
            url: '{{ route("account.AdminProcessRegister") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {

            $("button[type=submit]").prop("disabled", false);

                var errors = response.errors;

                if (response.status == false) {
                    if (errors.name) {
                        $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                        $("#name").addClass('is-invalid');
                    } else {
                        $("#name").siblings("p").removeClass('invalid-feedback').html('');
                        $("#name").removeClass('is-invalid');
                    }

                    if (errors.email) {
                        $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                        $("#email").addClass('is-invalid');
                    } else {
                        $("#email").siblings("p").removeClass('invalid-feedback').html('');
                        $("#email").removeClass('is-invalid');
                    }

                    if (errors.password) {
                        $("#password").siblings("p").addClass('invalid-feedback').html(errors
                            .password);
                        $("#password").addClass('is-invalid');
                    } else {
                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');
                    }
                } else {

                    $("#name").siblings("p").removeClass('invalid-feedback').html('');
                    $("#name").removeClass('is-invalid');

                    $("#email").siblings("p").removeClass('invalid-feedback').html('');
                    $("#email").removeClass('is-invalid');
                    
                    $("#password").siblings("p").removeClass('invalid-feedback').html('');
                    $("#password").removeClass('is-invalid');

                    window.location.href="{{ route('admin.login') }}"

                }


            },
            error: function(jqXHR, execption) {
                console.log("something went wrong");
            }
        });
    });
</script>

</html> --}}
