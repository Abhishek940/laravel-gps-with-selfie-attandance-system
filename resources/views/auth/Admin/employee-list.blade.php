@extends('auth.Admin.app')
@section('title', 'Employee list')
@section('content')

 <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Employee list</h1>
          </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Employee list</a></li>
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
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Email Id</th>
                    <th>Address</th>
					<th>Edit</th>
					<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $row)
			
                <tr>
				 <td>{{$loop->iteration}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->mobile}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->address}}</td>
			
				  			                                    
                  <td><a href="{{route('edit-employee',$row->id)}}" class="btn btn-success">Edit</td>
						
                  <form action="{{ route('delete-employee',$row->id) }}" method="post">
                  <input type="hidden" name="_method" value="DELETE" />
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <td><input type="submit" class="btn btn-danger" value="delete" /></td>
                  </form>
				 
				  </td>
                </tr>
                      
                @endforeach
                       
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> 
@endsection