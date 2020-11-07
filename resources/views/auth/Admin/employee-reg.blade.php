@extends('auth.Admin.app')
@section('title', 'Employee Register')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags">Employee Registration</i></h1>
        </div>
    </div>
   
 <div class="row">
 <div class="col-md-7 mx-auto">
<div class="tile">
<h3 class="tile-title">Employee Registration</h3>
<form action="{{route('employee.register.submit')}}" method="POST" role="form" enctype="multipart/form-data">
  @csrf
<div class="tile-body">
<div class="form-group">
<label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label class="control-label" for="name">Mobile No. <span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="name" autofocus>
@error('mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
 
<div class="form-group">
<label class="control-label" for="name">Email Id <span class="m-l-5 text-danger"> *</span></label>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
 
 <div class="form-group">
<label class="control-label" for="name">Password<span class="m-l-5 text-danger"> *</span></label>
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
    
<div class="form-group">
<label class="control-label" for="name">Confirm Password<span class="m-l-5 text-danger"> *</span></label>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>	
 
<div class="form-group">
<label class="control-label" for="description">Address</label>
<textarea class="form-control" rows="4" name="address" id="description">{{ old('address') }}</textarea>
 </div> 
</div>
<div class="tile-footer">
<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</div>
</form>
</div>
</div>
<div class="col-md-5"></div>
</div>
@endsection