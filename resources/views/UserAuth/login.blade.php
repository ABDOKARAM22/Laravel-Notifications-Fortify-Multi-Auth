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
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2 class="text-center">User Login</h2>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
              <!-- Error message -->
              @error('email')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Enter password" />
              <!-- Error message -->
              @error('password')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                  class="link-danger">Register</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  
</body>
</html>
