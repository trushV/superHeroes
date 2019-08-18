@include('parts.header')
<section id="home-section-1">
    <div class="link-container">
        {{$heroes->links()}}
    </div>
</section>
<section id="home-section-2">
    <div class="container">
       @foreach($heroes as $hero)
            <div class="repeater-item">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <p class="card-text"><a href="/superhero/{{$hero->id}}" >Nickname: {{$hero->nickname}}</a></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/superhero/{{$hero->id}}/edit">Edit</a></button>
                                <form action = "/superhero/{{$hero->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  class="btn btn-sm btn-outline-secondary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="home-hero-link" href="/superhero/{{$hero->id}}">
                        @if ($hero->images()->first()['path'])
                            <img src="{{asset($hero->images()->first()['path'])}}">
                        @else
                            <img src="{{asset('/images/default.jpg')}}">
                        @endif

                    </a>
                </div>
            </div>
      @endforeach
    </div>
</section>
<section id="home-section-3">
    <div class="link-container">
        {{$heroes->links()}}
    </div>
</section>
@include('parts.footer')
