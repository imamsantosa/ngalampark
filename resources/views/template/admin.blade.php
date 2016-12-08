<!DOCTYPE html>
<html lang="in">
<head>
    <title>@yield('title')</title>
    <link href="{{url('assets/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('assets/bootstrap/css/santosa.css')}}" rel="stylesheet">
    <link href="{{url('assets/bootstrap/css/fontawesome.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
<div id="header">
    @include('partials.menuadmin')
</div>

<div id="content" style="margin-top: 60px">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>
@include('partials.footer')

<script src="{{url('assets/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{url('assets/bootstrap/js/bootstrap.js')}}" ></script>
<script>
    $(document).ready(function() {

    });
</script>
@yield('additional-footer')
</body>
</html>