<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>

  <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications <span class="badge badge-warning">{{ Auth::user()->unreadNotifications()->count() }}</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach (Auth::user()->notifications->all() as $notification)
            <a class="dropdown-item @if(!$notification->read_at) font-weight-bold text-danger @endif" href="{{ route('read',['id'=>$notification->id]) }}">
              {{ $notification->data['body'] }}
              <p>{{ $notification->data['message'] }}</p>
            </a>
            @endforeach
            
            <form action="{{ route('markAllAsRead') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary btn-block">Mark All as Read</button>
            </form>
  
            <form action="{{ route('deleteAllNotifications') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger btn-block mt-2">Delete All Notifications</button>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  
<div class="container">
  <div class="row justify-content-center mt-6">
    <div class="col-md-12 text-center">
      <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading">Welcome {{ Auth::guard('admin')->user()->name }}</h4>
        <hr>
        <p>This Page Is Intended For Admins.</p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
