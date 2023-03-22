<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Backend/login')}}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('Backend/login')}}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Backend/login')}}/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('Backend/login')}}/css/style.css">

    <title>Login #2</title>
  </head>
  <body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('Backend/login')}}/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Vetican</strong></h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group first">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="your-email@gmail.com" id="username" name="email" value="{{old('email')}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="form-group last mb-3">
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>



    <script src="{{asset('Backend/login')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('Backend/login')}}/js/popper.min.js"></script>
    <script src="{{asset('Backend/login')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('Backend/login')}}/js/main.js"></script>
  </body>
</html>
