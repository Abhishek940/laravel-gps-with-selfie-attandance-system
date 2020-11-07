@extends('auth.Admin.app')
@section('title', 'Change Password')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags">Change Password</i></h1>
        </div>
    </div>
   
 <div class="row">
 <div class="col-md-7 mx-auto">
<div class="tile">
<h3 class="tile-title">Change Password</h3>
<form action="{{route('admin.change.password.submit')}}" method="POST" role="form" enctype="multipart/form-data">
  @csrf
@foreach ($errors->all() as $error)
<p class="text-danger">{{ $error }}</p>
  @endforeach 
<div class="tile-body">
<div class="form-group">
<label class="control-label" for="name">Old Password <span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="password" class="form-control @error('name') is-invalid @enderror" name="current_password" required autocomplete="name" autofocus>
</div>
 
 <div class="form-group">
<label class="control-label" for="name">New Password<span class="m-l-5 text-danger"> *</span></label>
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
</div>
    
<div class="form-group">
<label class="control-label" for="name">Confirm Password<span class="m-l-5 text-danger"> *</span></label>
<input id="password-confirm" type="password" class="form-control" name="new_confirm_password" required autocomplete="new-password">
</div>	
 
 
</div>
<div class="tile-footer">
<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
</div>
</form>
</div>
</div>
<div class="col-md-5"></div>
</div>
@endsection