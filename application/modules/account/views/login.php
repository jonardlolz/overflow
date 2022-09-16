<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('dist/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('dist/plugins/toastr/toastr.min.css') ?>">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" id="form-login" method="post">
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" autocomplete='off'>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete='off'>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-end align-items-center">
            <div class="col-8">
              <a href="<?= base_url('account/register') ?>" class="text-center">Don't have an account?</a>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('dist/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
  <!-- jQuery Validation App -->
  <script src="<?= base_url('dist/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
  <!-- Toastr js -->
  <script src="<?= base_url('dist/plugins/toastr/toastr.min.js') ?>"></script>

  <script>
    $(document).ready(function() {

      $("#form-login").validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {

          $.ajax({
            url: '<?= base_url('account/accountlogin'); ?>',
            type: "post",
            data: $(form).serialize(),
            dataType: 'json',
            success: function(response) {
              if (response.success == false) {
                toastr.error('Wrong password!');
              } else if (response.success == true) {
                toastr.success("Account exists!");
                window.location.replace('<?= base_url('home/index'); ?>');
              } else if (response.error == 'error') {
                toastr.error('Account does not exist!');
              }
            }
          })
        }
      })
    });
  </script>
</body>

</html>