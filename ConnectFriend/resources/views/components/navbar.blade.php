<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>ConnectFriend | @yield('title')</title>
</head>
<body>
     <nav class="navbar navbar-expand-lg  bg-light">
          <div class="container">
               <a class="navbar-brand" href="#">ConnectFriend</a>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-5">
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('home') }}">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('register.form') }}">Writers</a>
                         </li>
                         <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Change Language
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Indonesia</a></li>
                                <li><a class="dropdown-item" href="#">English</a></li>
                            </ul>
                        </div>
                        @auth
                              @if (Auth::user()->ProfilePicture == '')
                                   <a href="{{ route('profile') }}">
                                        <img src="./profile_picture/Default.png" alt="" class="rounded" style="width: 40px; height: 40px;">
                                   </a>
                              @else
                                   <a href="{{ route('profile') }}">
                                        <img src="{{ Auth::user()->ProfilePicture }}" alt="" class="rounded" style="width: 40px; height: 40px;">
                                   </a>
                              @endif
                              <form action="{{ route('logout') }} method="POST">
                                   @csrf
                                   <button type="submit" class="btn btn-danger">Log Out</button>
                              </form>
                        @endauth
                        @guest
                              <a class="btn btn-primary" href={{ route('login.form') }} role="button">Login</a>
                        @endguest
                    </ul>
               </div>
          </div>
     </nav>
     <div>
          @yield('content')
     </div>
     <footer class="bg-black d-flex justify-content-center align-items-center p-4">
          <div class="text-light">
               &copy; ConnectFriend 2024 | Web Programming | Daniel Kurniawan | 2602090164
          </div>
     </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>