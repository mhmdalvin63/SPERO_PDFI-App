<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('../dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('../dist/assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" href="{{asset('../dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{asset('../dist/assets/images/logo/favicon.png')}}" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
            @if (session('error'))
                  <div  class="alert alert-danger alert-dismissible fade show">
                      {{ session('error') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              @endif
            <form method="POST" action="{{route('postregister.user')}}">
            @csrf
            @method('PUT')
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password" type="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password2" type="password" name="password" class="form-control form-control-xl" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input onclick="myFunction()" class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Show Password
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="/login" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
    
<script src="{{asset('../dist/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('../dist/assets/js/app.js')}}"></script>
<script src="{{asset('../dist/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('../dist/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('../dist/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{asset('../dist/assets/js/pages/form-element-select.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
function myFunction() {
var x = document.getElementById("password");
var y = document.getElementById("password2");
if (x.type === "password" && y.type === "password") {
  x.type = "text";
  y.type = "text";
} else {
  x.type = "password";
  y.type = "password";
}
}
</script>
</body>

</html>