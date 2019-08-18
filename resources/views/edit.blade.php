@include('parts.header')
<section id="edit-section-1">
    <div class="container">
        <h1>Superhero editing mode</h1>
        <form action="/superhero/{{$hero->id}}" method="POST" class="edit-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">NickName</label>
{{--                @php(dd($hero))--}}
                <input type="text" class="form-control" name="nickname"  value="{{$hero->nickname}}">
{{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <div class="form-group">
                <label for="real_name">Real name</label>
                <input type="text" class="form-control" name="real_name" value="{{$hero->real_name}}">
            </div>
            <div class="form-group">
                <label for="superpowers">Superpowers</label>
                <input type="text" class="form-control" name="superpowers" value="{{$hero->superpowers}}">
            </div>
            <div class="form-group">
                <label for="catch_phrase">Catch phrase</label>
                <input type="text" class="form-control" name="catch_phrase" value="{{$hero->catch_phrase}}">
            </div>
            <div class="form-group">
                <label for="origin_description">Description</label>
                <textarea type="text" class="form-control" name="origin_description" >{{$hero->origin_description}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" id="fileMulti" name="fileMulti[]" multiple />
            </div>
            <div class="row">
                <span id="output"></span>
            </div>
            @if($hero->images()->get())
                <div class="gallery-wrap">
                @foreach($hero->images()->get() as $image)
                        <div class="img-wrap">
                            <input id="heroImage" name="image[]" type="hidden" value="{{$image->id}}">
                            <div class="bg-dim"></div>
                                <button type="button" class="btn btn-danger img-delete-button">Danger</button>
                                <img src="{{asset($image->path)}}" class="{{$image->id}}">
                            </div>
                     @endforeach
                </div>

            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<script type="text/javascript">
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        for (var i = 0, f; f = files[i]; i++) {
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                    document.getElementById('output').insertBefore(span, null);
                };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('fileMulti').addEventListener('change', handleFileSelect, false);
    $( document ).ready(function() {
        $('.img-wrap').mouseover(function(){
           $(this).parent().prevObject.find('.bg-dim').fadeIn();
            $(this).parent().prevObject.find('.img-delete-button').fadeIn();
        });

        $('.img-wrap').mouseleave(function(){
            $(this).parent().prevObject.find('.bg-dim').fadeOut();
            $(this).parent().prevObject.find('.img-delete-button').fadeOut();
        });
        $('.img-delete-button').click(function(){
            $(this).parent().remove();
        });
    });
</script>
@include('parts.footer')
