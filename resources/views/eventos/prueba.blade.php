<form action="{{ route('banco.notoficarPago', ['type' => 'payment', 'id' => '3952816']) }}" method="POST">
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        {!! Form::submit('Notificar Pago', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}