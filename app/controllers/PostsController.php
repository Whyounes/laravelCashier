<?php

class PostsController extends BaseController{

    public function show( $id ){
        $post = Post::find( $id );

        if( $post->is_premium && Auth::user()->stripe_plan != 'gold' )
            return View::make('error', [ 'message' => 'Only GOLD members can read this post, <a href="/upgrade">upgrade</a> your membership to get access' ] );
        
        return View::make('post', [ 'post' => $post ] );
    }//show
}