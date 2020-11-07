<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
  	<link rel="stylesheet" type="text/css" href="{{ asset('url/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('url/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
	
 
</head>

<body class="app sidebar-mini rtl">
    @include('Employee.header')
    @include('Employee.sidebar')
    <main class="app-content">
	 @include('Employee.flash-message')
        @yield('content')
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('url/js/popper.min.js') }}"></script>
    <script src="{{ asset('url/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('url/js/main1.js') }}"></script>
    <script src="{{ asset('url/js/plugins/pace.min.js') }}"></script>

    @yield('scripts')
</body>

</html>
