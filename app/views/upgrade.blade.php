@extends("masters.default")

@section("content")
<div class="row">

    <div class="col-md-6 col-md-offset-3" style="padding-top: 70px;">
        {{ Form::open( [ 'route' => 'upgrade.store', 'class' => 'form-horizontal', 'role' => 'form' ] )}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="text-center">GOLD</h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong style="font-size: 100px;">$40</strong></p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><i class="icon-ok text-danger"></i>GOLD members have access to more materials etc...</li>
            </ul>
            <div class="panel-footer">
                {{ Form::submit('Upgrade', [ 'class' => 'btn btn-lg btn-block btn-info' ]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>

</div>
@stop