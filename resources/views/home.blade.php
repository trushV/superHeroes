@include('parts.header')
<section id="home-section-1">
    <div class="container">
        {{$heroes->links()}}
    </div>
</section>
<section id="home-section-2">
    <div class="container">
       @foreach($heroes as $hero)
            <div class="repeater-item">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <p class="card-text"><a href="#" >Nickname: {{$hero->nickname}}</a></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                            </div>
                        </div>
                    </div>
                    <a class="home-hero-link" href="#'"><img src="{{$hero->images()->first()['path']}}"></a>
                </div>
            </div>
      @endforeach
    </div>
</section>
<section id="home-section-3">
    <div class="container">
        {{$heroes->links()}}
    </div>
</section>
@include('parts.footer')
