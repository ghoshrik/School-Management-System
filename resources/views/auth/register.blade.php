<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <!--notify js -->
    <script src="/admin/js/notify.js"></script>
<script src="/admin/js/notify.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>

<style type="text/css">
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
</head>
<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome To School Managment System</h3>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Register Yourself As An Admin First</h3>
                        <form action="{{route('admin.store')}}" method="POST" id="adminreg">
                            @csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Full Name *" value="" />
                                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <input name="usertype" type="text" class="form-control" placeholder="User Type *" value="Admin" readonly/>
                                            <font style="color: red">{{($errors->has('usertype'))?($errors->first('usertype')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <select name="gender" class="form-control">
                                                <option class="hidden" value="" selected disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <font style="color: red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" id="password" placeholder="Password *" value="" />
                                            <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <input name="conf_pass" type="password" class="form-control" id="confirm_password"  placeholder="Confirm Password *" value="" />
                                            <font style="color: red">{{($errors->has('conf_pass'))?($errors->first('conf_pass')):''}}</font>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" placeholder="Your Email *" value="" />
                                            <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="mobile" class="form-control" placeholder="Your Phone *" value="" />
                                            <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="address" type="text" class="form-control" placeholder="Enter Your Address *" value="" ></textarea>
                                            <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                                        </div>
                                        <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                                        <input type="submit" name="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/admin/plugins/jquery-validation/additional-methods.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="/admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/vendor/chart.js/chart.min.js"></script>
  <script src="/admin/vendor/echarts/echarts.min.js"></script>
  <script src="/admin/vendor/quill/quill.min.js"></script>
  <script src="/admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin/js/main.js"></script>

<script>
  $(function () {
    $('#adminreg').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        mobile: {
          required: true,
        },
        gender: {
          required: true,
        },
        address: {
          required: true,
        },
        usertype: {
          required: true,
        },
        password: {
          minlength: 6
        },
        conf_pass: {
          minlength: 6,
          equalTo : '[name="password"]'
        },
      },
      messages: {
        name: {
          required: "Please enter a name address",
          name: "Please enter a <em>valid</em> name address"
        },
        email: {
          required: "Please enter a email address",
          email: "Please enter a <em>valid</em> email address"
        },
        password: {
          required: "Please enter a password",
          minlength: "Your password must be at least 6 characters or number long"
        },
        conf_pass: {
          required: "Please enter confirm password",
          equalTo: "Confirm password does not match"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
<script>
    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
    $(document).ready(function () {
       $("#confirm_password").keyup(checkPasswordMatch);
    });
    </script>
</body>

</html>