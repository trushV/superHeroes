@include('parts.header')
<section id="edit-section-1">
    <div class="container">
        <h1>Superhero editing mode</h1>
        <form action="/superhero" method="POST" class="edit-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">NickName</label>
                {{--                @php(dd($hero))--}}
                <input type="text" class="form-control" name="nickname"  value="">
                {{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <div class="form-group">
                <label for="real_name">Real name</label>
                <input type="text" class="form-control" name="real_name" value="">
            </div>
            <div class="form-group">
                <label for="superpowers">Superpowers</label>
                <input type="text" class="form-control" name="superpowers" value="">
            </div>
            <div class="form-group">
                <label for="catch_phrase">Catch phrase</label>
                <input type="text" class="form-control" name="catch_phrase" value="">
            </div>
            <div class="form-group">
                <label for="origin_description">Description</label>
                <textarea type="text" class="form-control" name="origin_description" ></textarea>
            </div>
            <div class="form-group">
                <input type="file" id="fileMulti" name="fileMulti[]" multiple />
            </div>
            <div class="row">
                <span id="output"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@include('parts.footer')
