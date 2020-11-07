<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Forget Password</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}" />
</head>
<body>

    <!-- Page Wrapper -->
    <div class="lgn-background" style="background-image: url(uploads/slider-law-1.jpg);">
        <div class="lgn-wrapper">
            <div class="lgn-logo text-center">
                <h2 style="color:#fff;font-size:24px;text-align:center">Employee Forget Password &nbsp;&nbsp;&nbsp;&nbsp;</h2>
            </div>
            @if (session('status'))
           <div class="alert alert-success" role="alert">
           {{ session('status') }}
           </div>
            @endif
            <div id="login-form" class="lgn-form ">
                <form class="form-vertical" action="{{ route('user.password.email') }}" method="post">
				@csrf
                   <div class="lgn-input form-group">
                    <label class="control-label col-sm-12">Email Id</label>
                    <div class="col-sm-12">
											  
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				     @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                    
                   
                    <div class="lgn-submit">
                        <button type="submit" class="btn btn-primary btn-pill btn-lg" name="login"><i class="fa fa-btn fa-envelope"></i>&nbsp;&nbsp;Send Password Reset link</button>
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