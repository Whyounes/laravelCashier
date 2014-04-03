@extends("masters.default")

@section("content")

@if( $errors->any() )
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ implode("", $errors->all('<p>:message</p>') ) }}
    </div>
@endif

<div id="signupbox" style="margin-top:50px" class="mainbox mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>

            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                {{ HTML::link( '/login', 'Login' ) }}
            </div>
        </div>  
        <div class="panel-body" >
            {{ Form::open( [ 'route' => 'signup.store', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'subscription-form' ] )}}
                <div class="payment-errors"></div>
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>

                <div class="form-group">
                    {{ Form::label( 'subscription', 'Subscription plan', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-9">
                        {{ Form::select( 'subscription' , [ 'basic' => '(BASIC) 10$ per month', 'gold' => '(GOLD) 40$ per month' ], 'gold', [ 'class' => 'form-control' ])}}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label( 'email', 'Email', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-9">
                        {{ Form::email('email', '', [ 'class' => 'form-control', 'placeholder' => 'Email address' ])}}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label( 'password', 'Password', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-9">
                        {{ Form::password('password', [ 'class' => 'form-control', 'placeholder' => 'Password' ])}}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label( 'password_confirmation', 'Re-type Password', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-9">
                        {{ Form::password('password_confirmation', [ 'class' => 'form-control', 'placeholder' => 'Re-type Password' ])}}
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="form-group">
                    {{ Form::label( 'ccn', 'Credit card number', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-9">
                        {{ Form::text('ccn', '', [ 'class' => 'form-control', 'data-stripe' => 'number' ])}}
                    </div>
                </div>
                
                <div class="form-group">
                    {{ Form::label( 'expiration', 'Expiration date', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-6">
                        {{ Form::selectMonth('month', 'junuary', [ 'class' => 'form-control', 'data-stripe' => 'exp-month' ])}}
                    </div>
                    <div class="col-md-3">
                        {{ Form::selectRange('year', 2014, 2029, 2014, [ 'class' => 'form-control', 'data-stripe' => 'exp-year' ])}}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label( 'cvc', 'CVC number', [ 'class' => 'col-md-3 control-label' ])}}
                    <div class="col-md-3">
                        {{ Form::text('cvc', '', [ 'class' => 'form-control', 'data-stripe' => 'cvc' ])}}
                    </div>
                </div>

                <div class="form-group">
                    <!-- Button -->                                        
                    <div class="col-md-offset-3 col-md-9">
                        {{ Form::button('<i class="glyphicon glyphicon-hand-right"></i> &nbsp Sign Up', [ 'type' => 'submit', 'id'  => 'btn-signup', 'class' => 'btn btn-info'] ) }}
                    </div>
                </div>
            {{ Form::close() }}
         </div> <!-- Panel body -->
    </div> <!-- Panel -->
 </div> <!-- Signup box -->

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    Stripe.setPublishableKey('pk_test_tJOo0X1QE2OFs3JXwfGpWMpY');
    jQuery(function($) {
        $('#subscription-form').submit(function(event) {
            var $form = $(this);

            // Disable the submit button to prevent repeated clicks
            $form.find('button').prop('disabled', true);

            Stripe.card.createToken($form, stripeResponseHandler);

            // Prevent the form from submitting with the default action
            return false;
        });
    });

    var stripeResponseHandler = function(status, response) {
        var $form = $('#subscription-form');

        if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            // token contains id, last4, and card type
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and submit
            $form.get(0).submit();
        }
    };
</script>
@stop