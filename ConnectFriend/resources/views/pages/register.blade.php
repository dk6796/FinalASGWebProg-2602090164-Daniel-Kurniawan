<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href="{{ asset('app.css') }}">
     <title>Register</title>
</head>
<body>
     @if (session('success'))
          <div class="alert alert-success text-center">{{ session('success') }}</div>
     @endif
     <div class="d-flex flex-column justify-content-center align-items-center vh-100">
          <h2 class="text-blue fw-bold">Create Account</h2>
          <form class="d-flex flex-column gap-2 w-25" action="{{ route('register.create') }}" method="POST" enctype="multipart/form-data">
               @csrf
               {{-- <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="profpict">Profile Picture</label>
                         @error('profpict')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <input class="form-control" type="file" name="profpict" id="profpict">
               </div> --}}
               <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="username">Link Instagram Username</label>
                         @error('username')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <input type="text" class="form-control" id="username" name="username" placeholder="">
               </div>
               <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="username">Password</label>
                         @error('password')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="">
               </div>
               <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="profpict">Gender</label>
                         @error('gender')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="d-flex gap-3">
                         <div class="d-flex gap-2">
                              <input type="radio" name="gender" id="male" value="Male">
                              <label for="male">Male</label>
                         </div>
                         <div class="d-flex gap-2">
                              <input type="radio" name="gender" id="female" value="Female">
                              <label for="female">Female</label>
                         </div>
                    </div>
               </div>
               <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="hobby">Hobby</label>
                         @error('hobby')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <input type="text" class="form-control" name="hobby" id="hobby">
               </div>
               <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                         <label for="mobile">Mobile Number</label>
                         @error('mobile')
                              <div class="text-danger">*{{ $message }}</div>
                         @enderror
                    </div>
                    <input type="text" name="mobile" class="form-control" id="mobile">
               </div>
               <button type="submit" class="text-white bg-blue p-2 mt-2 rounded-2">Submit</button>
          </form>
          <div class="d-flex gap-2 mt-3">
            <div>Already have an account?</div>
            <a href={{ route('login.form') }}>Login</a>
          </div>
     </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>