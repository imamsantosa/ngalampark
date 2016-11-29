<div id="event">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-event text-center">
                    <h4><strong>Event</strong> terbaru di ngalam park</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="event-slider" class="owl-carousel">
                @foreach($events as $event)
                    <div class="col-md-3">
                        <div class="single-product">
                            <div class="single-event-img">
                                <img class="event-img" src="{{route('image', ['folder' => 'event', 'name' => $event->image])}}" alt="product">
                            </div>
                            <div class="title-event-single">
                                <div class="row">
                                    <a href="{{route('event-single', ['id' => $event->id, 'judul'=>$event->title])}}" class="event-detail">
                                        <div class="col-md-12 text-center">
                                            <p class="text-title-event-single">{{$event->title}}</p>
                                            <p class="text-event-date-single"><strong>{{$event->date}}</strong></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>