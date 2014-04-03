<?php

class UpgradeController extends BaseController{

    public function index(){
        return View::make('upgrade');
    }

    public function store(){
        if( !Auth::check() )
            return Redirect::route("login");

        Auth::user()->subscription('gold')->swap();

        return 'You are now a GOLD member';
    }
}