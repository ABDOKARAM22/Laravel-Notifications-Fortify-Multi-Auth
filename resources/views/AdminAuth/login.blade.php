<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>
<body>

<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <h2 class="text-center">Admin Login</h2>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example13">Email address</label>
              @error('email')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Password</label>
              @error('password')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
  
            <!-- Register -->
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}" class="link-danger">Register</a></p>
            </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <a href="#">Forgot password?</a>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
