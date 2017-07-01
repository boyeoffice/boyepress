<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name')}} &lsaquo; Dashbord</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/ionicons.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/skin-red.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/normalize.less')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/vue-multiselect.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/toastr.css')}}">
	<script>
		window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }

        window.User = {!! Auth::user() !!}
        window.url = "{{url('/')}}"
	</script>
</head>
<body class="skin-red">
<div id="app"></div>
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
</body>
</html>