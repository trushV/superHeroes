@include('parts.header')
<section id="view-section-1">
    <div class="container">
        <h1> View Superhero</h1>
        <div class="content-wrap">
            <div class="side-bar">
                <div class="sd-img-wrap">
                    <img src="{{asset($hero->images()->first()['path'])}}">
                </div>
            </div>
            <div class="main-content">
                <div>
                    <span class="sub-head-wrap">NickName:</span> {{$hero->nickname}}
                </div>
                <div>
                    <span class="sub-head-wrap">Real name:</span> {{$hero->real_name}}
                </div>
                <div>
                    <span class="sub-head-wrap">Origin description:</span> {{$hero->origin_description}}
                </div>
                <div>
                    <span class="sub-head-wrap">Superpowers:</span> {{$hero->superpowers}}
                </div>
                <div>
                    <span class="sub-head-wrap">Origin description:</span> {{$hero->catch_phrase}}
                </div>
            </div>
        </div>
        <div class="gallery-wrap">
            @foreach($hero->images()->get() as $image)
                <div class="img-wrap">
                    <img src="{{asset($image->path)}}">
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('parts.footer')
