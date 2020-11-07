@extends('auth.Admin.app')
@section('title', 'Attandance list')
@section('content')

 <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Attandance list</h1>
          </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Attandance list</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
				  <th>S.no</th>
				    <th>User Name</th>
                     <th>Date&nbsp;(Log in/out Date and Time)</th>
					<th>location&nbsp;(Log In/Log Out location)</th>
					<th>Image</th>
					
					</tr>
                </thead>
                <tbody>
                @foreach($employee as $row)
			
                <tr>
               <td>{{$loop->iteration}}</td>
			   <td>{{ $row->name }}</td>
        	    <td>{{$row->created_at}}</td>
			    <td>{{$row->location_in}}</td>
				<td><img src="{{url($row->image) }}" style="height:70px;width:70px"></td>
				 </tr>
                				 
				 @endforeach
                       
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> 
@endsection