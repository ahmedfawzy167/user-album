<!-- Section: Design Block -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="{{asset('assets/img/login.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .rounded-t-5 {
          border-top-left-radius: 0.5rem;
          border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
          .rounded-tr-lg-0 {
            border-top-right-radius: 0;
          }

          .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
          }
        }

      </style>

</head>
<body>

    <div class="container-fluid d-flex justify-content-center">
     <div class="row justify-content-center mt-4">
     <div class="card mb-3">
         <div class="card-body py-3">
            <h3 class="text-center mt-2">Login to Your Account</h3>
            <form method="POST" action="{{route('login')}}">
                @csrf
              <div class="form-group mb-2">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email Address</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                @error('email')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
               @enderror
              </div>
              <div class="form-group">
                <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" />
                @error('password')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
              @enderror
              </div>

              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
               <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
               <hr class="mt-2">
               <a href="{{route('register')}}" class="w-100 btn btn-success mt-2">Create an Account</a>
            </form>

          </div>
        </div>
      </div>
    </div>
</body>
</html>









































































































































