<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Login</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}" />
</head>
<body>

    <!-- Page Wrapper -->
    <div class="lgn-background" style="background-image: url(uploads/slider-law-1.jpg);">
        <div class="lgn-wrapper">
            <div class="lgn-logo text-center">
                <h2 style="color:#fff;font-size:24px;text-align:center">Employee Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            </div>
            <div id="login-form" class="lgn-form ">
                <form class="form-vertical" action="{{ route('login') }}" method="post">
                  @csrf
                    <div class="lgn-input form-group">
                    <label class="control-label col-sm-12">Username</label>
                    <div class="col-sm-12">
											  
                    <input type="text" name="email" id="lgn-mail" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror" autofocus value="{{ old('email') }}"/>
                    </div>
						@error('email')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                    <div class="lgn-input form-group">
                        <label class="control-label col-sm-12">Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="password" id="lgn-pass" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" autofocus value="{{old('password')}}">
                        </div>
                       	@error('password')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror						
                    </div>
                    <div class="lgn-forgot">
                        <a href="{{route('forget-password')}}">Forgotten Password?</a>
                    </div>
                    <div class="lgn-submit">
                        <button type="submit" id="" class="btn btn-primary btn-pill btn-lg" name="login">Login</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>

   
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{asset('assets/plugin/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- Popper Plugin -->
    <script type="text/javascript" src="{{asset('assets/plugin/popper/popper.min.js')}}"></script>
    <!-- Bootstrap Framework -->
    <script type="text/javascript" src="{{asset('assets/plugin/bootstrap/bootstrap.min.js')}}"></script>
</body>
</html>