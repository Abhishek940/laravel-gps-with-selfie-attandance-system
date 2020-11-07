@extends('auth.employee.app')
@section('title', 'Make Attandance')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags">Make Attandance</i></h1>
        </div>
    </div>
  
 <!-- $current_month=date('M');
$month=date('m');
$current_date=date('Y-m-d');
$current_day=date('D');
$currentday=date('d');
$year=date('Y');
$current_time=date('H:i');
---->
 <div class="row">
 <div class="col-md-3 mx-auto">
<div class="tile">
<h5 class="tile-title" style="color:red">Mr.{{ Auth::user()->name }}</h5>
<form action="" method="POST" role="form" enctype="multipart/form-data">
<div class="tile-body">
<div class="form-group">
<label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
<input id="name" type="test" class="form-control" value="{{ Auth::user()->name }}" readonly>
</div>

<div class="form-group">
<label class="control-label" for="name">Day<span class="m-l-5 text-danger"> *</span></label>
<input  type="text" class="form-control" value="{{$current_day=date('D')}}" readonly>
</div>

 <div class="form-group">
<label class="control-label" for="name">Month<span class="m-l-5 text-danger"> *</span></label>
<input id="password" type="text" class="form-control" name="new_password"  value="{{$month=date('M')}}" readonly>
</div>
    
 <div class="form-group">
<label class="control-label" for="name">Date<span class="m-l-5 text-danger"> *</span></label>
<input  type="text" class="form-control" value="{{$current_date=date('Y-m-d')}}" readonly>
</div>
 
</div>

</form>
</div>
</div>

<div class="col-md-9">
<div class="tile">
<h3 style="text-align:center"><?php  echo date('H:i:s');?></h3>
<h3 class="tile-title" style="text-align:center">Make Attandance</h3>
<br>
  
<div class="tile-body">
<div class="row">
<div class="col-md-3">
<div class="form-group">
<p class="bs-component" id="timer">
<button class="btn btn-primary btn-lg btn-block" type="submit" id="" ><span>Punch In<span></button>
</p>
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<p class="bs-component" id="">
<button class="btn btn-danger btn-lg btn-block" type="submit" id='submit' onmouseover="getLocation()"><span>Get Location<span></button>
</p>
</div>
</div>

<form method="post" action="{{route('employee.location.submit')}}" enctype="multipart/form-data">
@csrf
<div id="output"></div>
<div class="form-group">
<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
<input type="hidden" name="time_id" value="">
<input type='text' class="form-control" name="location_in" id='addr_location'  readonly  style="width:280px;height:50px"/>
<input type='hidden' class="form-control" name="location_out" id='addr_location' readonly  style="width:280px;height:20px"/>
<input type="hidden" name="latlong" id="latlong" >
<!-- <input type="hidden" name="longitude" id="longitude" value=""> -->
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-6">
<div id="my_camera"></div>
<br/>
<input type=button value="Take Snapshot" onClick="take_snapshot()">
<input type="hidden" name="image" class="image-tag">
</div>
<div class="col-md-6">
<div id="results">Your captured image will appear here...</div>
</div>

<div class="col-md-12 text-center">
<br/>
<button class="btn btn-danger" type="submit" id='submit' onmouseover="getLocation()"><span>Submit<span></button>
</div>
</div>
   
</div>
  
 </form>	

<script language="JavaScript">
    Webcam.set({
		
        width: 300,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
<script type="text/javascript">
  
  setTimeout(function() {
    $('#successMessage').fadeOut('slow');
    }, 3000); // <-- time in milliseconds

</script>

<div id="map"></div>

<script type="text/javascript">
   var ab;
   function showPosition(position){

   ab = position.coords.latitude+","+position.coords.longitude;    
  
   }
    
    function getLocation(){
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }
    
    function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

  </script>
  <!-- end of geo location -->
   <script>      
    
      function geocodeLatLng(geocoder, map, infowindow) {

          var input = ab;
          var latlngStr = input.split(',', 2);
          var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};


        geocoder.geocode({'location': latlng}, function(results, status) {

          if (status === 'OK') {
            if (results[0]) {

        document.getElementById('addr_location').value = results[0].formatted_address;
        document.getElementById('latlong').value = input;

            } else {
              window.alert('No address location found !');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }

        });



      }
    function initMap() {


        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
        });
      }

    </script>

<script async defer

 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApqbf345qsyY-V5FuRMKCR6N_J4fi16Mk&callback=initMap">

</script>

</script>

</div>
</div> 
</div>
</div>
</div>


@endsection
