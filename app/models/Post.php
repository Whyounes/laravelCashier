<?php 

class Post extends Eloquent{

    protected $table = 'posts';

    protected $fillable = [ 'title', 'content', 'is_premium' ];

}