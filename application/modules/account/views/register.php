<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

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

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="" id="form-register" method="post">
          <div class="input-group mb-3">
            <input name="firstname" type="text" class="form-control" placeholder="First name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="lastname" type="text" class="form-control" placeholder="Last name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" id="password" class="form-control" type="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="repeatpassword" type="password" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row d-flex align-items-center">
            <div class="col-8">
              <a href="<?= base_url('account/login'); ?>">Already have an account?</a>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->


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
  <!-- Sweetalert js -->
  <script src="<?= base_url('dist/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

  <script>
    $(document).ready(function() {
      $.validator.addMethod('alphabet', function(value, element) { //TODO: create method for password to ONLY accept password with 1 num, 1 upper, 1 lower, and special char
        if (/^(?=.*[0-9])$/.test(value)) {
          return true; // FAIL validation when REGEX matches
        } else {
          return false; // PASS validation otherwise
        };
      }, "error");

      $("#form-register").validate({
        rules: {
          firstname: {
            required: true,
          },
          lastname: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 5,
          },
          repeatpassword: {
            required: true,
            equalTo: "#password",
          }
        },
        messages: {
          password: {
            minlength: "Password must contain at least 5 characters",
          },
          repeatpassword: {
            equalTo: "Input the same password",
          }
        },
        submitHandler: function(form) {
          var BASEURL = "<?= base_url(); ?>";
          $.ajax({
            url: BASEURL + 'account/registercreate',
            type: "post",
            data: $(form).serialize(),
            success: function(response) {
              if (response == 'true') {
                toastr.success("Account successfully registered!");
                $(':input', '#form-register')
                  .not(':button, :submit, :reset, :hidden')
                  .val('')
                  .prop('checked', false)
                  .prop('selected', false)
                  .removeClass('is-valid');

                Swal.fire(
                  'Account successfully registered!',
                  '',
                  'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                      window.location.replace('<?= base_url('account/login') ?>')
                    }

                  }

                );
              } else if (response == 'false') {
                toastr.error("Account was not registered!");
              } else {
                alert(response);
              }
            }
          })
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
          $(element).removeClass('is-invalid').addClass('is-valid');
        }
      });
    });
  </script>
</body>

</html>