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
                    <th>Start Time</th>
                    <th>End time</th>
                    <th>Total Time</th>
					<th>Delete</th>
					</tr>
                </thead>
                <tbody>
                @foreach($employee as $row)
			
                <tr>
               <td>{{$loop->iteration}}</td>
			   
                  <td>{{ $row->name }}</td>

			   <td>{{$starttime=Carbon\Carbon::parse($row->{'time_start'})}}</td>
                 <td>{{$endtime=Carbon\Carbon::parse($row->{'time_end'})}}</td>
				  <td>{{$totalduration =  $starttime->diff($endtime)->format('%H:%I:%S')." Minutes"}}</td> 
				  
                
                 <form action="{{ route('delete-attandance',$row->id) }}" method="post">
                  <input type="hidden" name="_method" value="DELETE" />
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <td><input type="submit" class="btn btn-danger" value="delete" /></td>
                  </form>
				  </tr>
                
				 
				 @endforeach
                       
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> 
@endsection