<?php

class SignupController extends BaseController{

    public function index( ){
        if( Auth::check() )
            return Redirect::to("/");

        return View::make('signup');
    }

    public function store(){
        $user = new User;
        $user->email = Input::get( 'email' );
        $user->username = Input::get( 'username' );
        $user->password = Hash::make( Input::get( 'password' ) );
        $user->save();
        $user->subscription(Input::get( 'subscription' ))->create( Input::get( 'stripeToken' ) );

        return 'you are now registred';
    }

}