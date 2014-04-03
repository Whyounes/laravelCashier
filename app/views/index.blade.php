@extends("masters.default")

@section("content")
<style>
    .thumbnail>img {
        width: 100%;
    }
</style>
<h2><span class="label label-default">Latest posts:</span></h2>
<hr/>
<div class="row">
    @foreach( $posts as $post )
    <div class="col-sm-6 col-md-4">
        <div class="caption thumbnail">
            <h3>{{ $post->title }}</h3>
            <p>{{ str_limit( $post->content, 50, '...') }}</p>
            <p>{{ HTML::linkRoute('post', 'Read more', [ 'id' => $post->id ], [ 'class' => 'btn btn-primary', 'role' => 'buton'] ) }}</p>
        </div>
    </div>
    @endforeach

</div>
@stop