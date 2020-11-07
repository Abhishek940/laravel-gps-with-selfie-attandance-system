@extends('auth.admin.app')
@section('title', 'Edit employee')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags">Edit Employee</i></h1>
        </div>
    </div>
   
 <div class="row">
 <div class="col-md-7 mx-auto">
<div class="tile">
<h3 class="tile-title">Edit Employee</h3>
<form action="{{ route('edit-employee-submit',$employee->id) }}" method="post" role="form" enctype="multipart/form-data">
 @csrf
 {{ method_field('put') }}
<div class="tile-body">
<div class="form-group">
<label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$employee->name}}" autocomplete="name" autofocus>
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label class="control-label" for="name">Mobile No. <span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$employee->mobile}}" autocomplete="name" autofocus>
@error('mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
 
<div class="form-group">
<label class="control-label" for="name">Email Id <span class="m-l-5 text-danger"> *</span></label>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$employee->email }}" autocomplete="email">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
 
 
<div class="form-group">
<label class="control-label" for="description">Address</label>
<textarea class="form-control" rows="4" name="address" id="description">{{$employee->address }}</textarea>
 </div> 
</div>
<div class="tile-footer">
<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-secondary" href="{{route('employee.list')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
</div>
</form>
</div>
</div>
<div class="col-md-5"></div>
</div>
@endsection