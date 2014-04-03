<?php 

class LoginController extends BaseController{

    public function index(){
        if( Auth::check() )
            return Redirect::to("/");
        return View::make('login');
    }

    public function store(){
        if( Auth::attempt( Input::only( ['email', 'password'] ), true)){
            return Redirect::to('/');
        }
        else{
            
            return Redirect::back()->withInput()->with( 'message', 'Email or password incorrect' );
        }
    }

    public function destroy()
    {
        Auth::logout();
        return Redirect::route("login");
    }
}