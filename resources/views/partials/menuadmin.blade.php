<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/images/LOXO.png') }}" class="img-responsive logo-header">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('admin-home')}}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiketing <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin-add-tiket')}}">Data Tiket</a></li>
                        <li><a href="{{route('admin-data-pemesanan')}}">Data Pemesanan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Event <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin-add-event')}}">Tambah</a></li>
                        <li><a href="{{route('admin-data-event')}}">Data</a></li>
                    </ul>
                </li>
                <li><a href="{{route('logout')}}">Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
