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
            <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiket <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a role="button" data-toggle="modal" data-target="#pemesananmodal">Pemesanan</a></li>
                        <li><a href="{{route('batal-pemesanan')}}">Pembatalan</a></li>
                    </ul>
                </li>
                <li><a href="{{route('list-event')}}">Event</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="pemesananmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pemesanan Tiket</h4>
            </div>
            <form method="get" action="{{route('isi-data')}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tangal</label>
                        <select class="form-control" name="t">
                            @foreach($tiket as $t)
                            <option value="{{$t->id}}">{{$t->tanggal}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Total Tiket</label>
                        <select class="form-control" name="tk">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Lanjutkan &#8608;">
                </div>
            </form>
        </div>
    </div>
</div>