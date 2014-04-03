@extends("masters.default")

@section("content")
        @if( Session::get( 'message' ) )
            <div class="alert alert-danger">
                {{ Session::get( 'message' ) }}
            </div>
        @endif
        <div class="row">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        {{ Form::open([ 'route' => 'login.store', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'loginform' ])}}
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {{ Form::text( "email", "", [ 'class' => 'form-control', 'placeholder' => 'Email', 'id' => 'login-username'])}}
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                {{ Form::password( "password", [ 'class' => 'form-control', 'placeholder' => 'Password', 'id' => 'login-password'])}}
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    {{ Form::submit( 'Login', [ 'class' => 'btn btn-success', 'id' => 'btn-login' ] )}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account! 
                                        {{ HTML::link('/signup', 'Sign Up here' )}}
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div> <!-- Panel body -->
            </div> <!-- Panel -->
        </div><!-- Login Box -->
    </div>
@stop