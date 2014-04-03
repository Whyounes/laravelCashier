@extends("masters.default")

@section("content")
<div class="row">
    <div class="col-md-12">
        <h1 style="font-weight: bold;" class="post_title">{{ $post->title }}</h1> <hr/>
        <hr/>
        <p>{{ $post->content }}</p><hr/>
    </div><!--.col -->
    
</div><!--./row -->

@stop