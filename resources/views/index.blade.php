<!DOCTYPE html>
<html lang="in">
<head>
    <title>SELAMAT DATANG DI NGALAM PARK</title>
    <link href="{{url('assets/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('assets/bootstrap/css/santosa.css')}}" rel="stylesheet">
    <link href="{{url('assets/bootstrap/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('assets/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('assets/owl-carousel/owl.theme.css')}}" rel="stylesheet">
    <link href="{{url('assets/owl-carousel/owl.transitions.css')}}" rel="stylesheet">
</head>
<body>
<div id="header">
    @include('partials.menu')
    @include('partials.slider')
</div>
<div id="welcome">
    <div class="container">
        <div class="col-xs-12">
            <div class="title-welcome text-center">
                <h3>SELAMAT DATANG DI</h3>
                <H2><strong>NGALAMPARK.COM</strong></H2>
                <H3>MALANG - JAWA TIMUR - INDONESIA</H3>
            </div>
        </div>
    </div>
</div>
@include('partials.event-front')
@include('partials.footer')

<script src="{{url('assets/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{url('assets/bootstrap/js/bootstrap.js')}}" ></script>
<script src="{{url('assets/owl-carousel/owl.carousel.js')}}" ></script>
<script>
    $(document).ready(function() {

        $("#slider").owlCarousel({

            navigation : false, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            transitionStyle:"fade"

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });

        $("#event-slider").owlCarousel({

            items : 4,
            itemsDesktop: [1199,4],
            itemsDesktopSmall:[979,4],
            itemsTablet: [768,2],
            itemsMobile: [750,1],
            pagination: false,
            navigation : true,
//            navigationText: [
//                "<i class='fa fa-chevron-left icon-white'></i>",
//                "<i class='fa fa-chevron-right icon-white'></i>"
//            ]
        });

    });
</script>
</body>
</html>