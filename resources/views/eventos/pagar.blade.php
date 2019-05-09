@extends('template.main')

@section('title', 'Mis Eventos')
@section('content')

@php ( $aFavor = Auth::user()->saldo)
@php ( $TOTaPagar = 0 )

<section  id="blog">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title text-center wow fadeInDown">Pagar Evento</h2>
        </div>
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#infuser">
            Usuario: {{ Auth::user()->id }} - {{ Auth::user()->fullName }}
            <span class="glyphicon glyphicon-chevron-down" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span>
        </button>
        <div id="infuser" class="collapse in row">
            <br>
            <div class="col-md-5 wow fadeInLeft">
                <table class="table table-striped">
                    <tr>
                        <td width="50%" style="text-align:right;">{{ number_format(Auth::user()->saldo, 2, ",", ".") }}</td>
                        <td width="50%" style="text-align:left;">Saldo a Favor</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-7"></div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12 wow fadeInLeft">
                {!! Form::open(['name' => 'FPago']) !!}
                    <table class="table table-striped text-center">
                        <thead>
                            <th width="5%"></th>
                            <th width="10%">Evento</th>
                            <th width="40%"></th>
                            <th width="10%" style="text-align:center;"></th>
                            <th width="15%" style="text-align:center;"></th>
                            <th width="15%" style="text-align:center;"></th>
                        </thead>
                        <tbody>
                            @foreach($cuentas as $cuenta)
                                <tr style="background-color:#99ffd6">
                                    <td style="vertical-align:middle"></td>
                                    <td colspan="2" style="vertical-align:middle; text-align:left;"><b>{!! $cuenta->Evento->titulo !!}</b><br> Fecha de Inscripción el {{ date_format(date_create($cuenta->fec), 'd-m-Y') }}</td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"></td>
                                </tr>
                                @if ($clipaq->evento_id == $cuenta->Evento->id)
                                    @php ( $Evento  = $clipaq->evento_id )
                                    @php ( $Paquete = $clipaq->paquete_id )
                                    <tr>
                                        <td></td>
                                        <td style="vertical-align:middle;">
                                            @if (Auth::user()->pais <> "VE")
                                                @if ($clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado)
                                                    <span class="label label-danger">A Pagar</span>
                                                @else
                                                    <span class="label label-success">Pagado</span>
                                                @endif
                                            @else
                                                @if ($clipaq->costo - $clipaq->abonado)
                                                    <span class="label label-danger">A Pagar</span>
                                                @else
                                                    <span class="label label-success">Pagado</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle; text-align:left;">
                                            {{ $clipaq->Paquete->titulo }}<br>
                                            {{ $clipaq->Etapa->titulo }}
                                        </td>
                                        <td></td>
                                        <td style="vertical-align:middle; text-align:right;">
                                            @if (Auth::user()->pais <> "VE")
                                               Costo: ({{$cuenta->Evento->Moneda}})<br>
                                               Abonado ({{$cuenta->Evento->Moneda}}):<br>
                                               (-) a Favor ({{$cuenta->Evento->Moneda}}):<br>
                                               a Pagar ({{$cuenta->Evento->Moneda}}):
                                            @else
                                               Costo (Bs):<br>
                                               Abonado (Bs):<br>
                                               (-) a Favor (Bs):<br>
                                               a Pagar (Bs):
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle; text-align:right;">
                                            @if (Auth::user()->pais <> "VE")
                                                {{ number_format($clipaq->costo / $cuenta->Evento->MonedaCambio, 2, ",", ".") }}<br>
                                            @else
                                                {{ number_format($clipaq->costo, 2, ",", ".") }}<br>
                                            @endif
                                            {{ number_format($clipaq->abonado, 2, ",", ".") }}<br>
                                            @if ($aFavor > 0) 
                                                @if (Auth::user()->pais <> "VE")
                                                    @if ($aFavor <= $clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado)
                                                        @php ( $aPagar = $clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado - $aFavor )
                                                        @php ( $pagoC = $aFavor )
                                                        {{ number_format($aFavor, 2, ",", ".") }}<br>
                                                        {{ number_format($aPagar, 2, ",", ".") }}
                                                        @php ( $aFavor = 0)
                                                        @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                    @else
                                                        @php ( $aFavor = $aFavor - $clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado)
                                                        @php ( $aPagar = 0)
                                                        @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                        @php ( $pagoC = $clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado )
                                                        {{ number_format($clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado, 2, ",", ".") }}<br>
                                                        {{ number_format($aPagar, 2, ",", ".") }}
                                                    @endif
                                                @else
                                                    @if ($aFavor <= $clipaq->costo - $clipaq->abonado)
                                                        @php ( $aPagar = $clipaq->costo - $clipaq->abonado - $aFavor )
                                                        @php ( $pagoC = $aFavor )
                                                        {{ number_format($aFavor, 2, ",", ".") }}<br>
                                                        {{ number_format($aPagar, 2, ",", ".") }}
                                                        @php ( $aFavor = 0)
                                                        @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                    @else
                                                        @php ( $aFavor = $aFavor - $clipaq->costo - $clipaq->abonado)
                                                        @php ( $aPagar = 0)
                                                        @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                        @php ( $pagoC = $clipaq->costo - $clipaq->abonado )
                                                        {{ number_format($clipaq->costo - $clipaq->abonado, 2, ",", ".") }}<br>
                                                        {{ number_format($aPagar, 2, ",", ".") }}
                                                    @endif
                                                @endif
                                            @else
                                                @if (Auth::user()->pais <> "VE")
                                                    @php ( $aPagar = $clipaq->costo / $cuenta->Evento->MonedaCambio - $clipaq->abonado - $aFavor )
                                                    @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                    @php ( $pagoC = $TOTaPagar )
                                                    {{ number_format(0, 2, ",", ".") }}<br>
                                                    {{ number_format($aPagar, 2, ",", ".") }}
                                                @else
                                                    @php ( $aPagar = $clipaq->costo - $clipaq->abonado - $aFavor )
                                                    @php ( $TOTaPagar = $TOTaPagar + $aPagar )
                                                    @php ( $pagoC = $TOTaPagar )
                                                    {{ number_format(0, 2, ",", ".") }}<br>
                                                    {{ number_format($aPagar, 2, ",", ".") }}
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr style="background-color: white">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2" style="vertical-align:middle; text-align:right;">
                                    @if (Auth::user()->pais <> "VE")
                                        <b>Total a Pagar ({{$cuenta->Evento->Moneda}}):</b>
                                    @else
                                        <b>Total a Pagar (Bs):</b>
                                    @endif
                                </td>
                                <td style="vertical-align:middle; text-align:right;">
                                    {!! Form::text('total', number_format($TOTaPagar, 2, ",", "."), ['class' => 'form-control money', 'style' => 'text-align: right;', 'id' => 'total', 'readOnly' => 'true']) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                {!! Form::close() !!}            
                <ul class="nav nav-tabs">
                    @if (Auth::user()->saldo > 0)
                        <li class="active"><a data-toggle="tab" href="#FPago5">Saldo a Favor</a></li>
                        @if (($cuenta->Evento->participacion == 'nacional' OR $cuenta->Evento->participacion == 'mixto') AND Auth::user()->pais == "VE")
                            <li><a data-toggle="tab" href="#pagoNacional">Pago Nacional en Bs.</a></li>
                        @endif
                        @if (($cuenta->Evento->participacion == 'internacional' OR $cuenta->Evento->participacion == 'mixto'))
                            <li><a data-toggle="tab" href="#pagoInter"><img src="/images/mercadopago.ico" height="20px">Mercado Pago</a></li>
                        @endif
                    @else
                        @if (($cuenta->Evento->participacion == 'nacional' OR $cuenta->Evento->participacion == 'mixto') AND Auth::user()->pais == "VE")
                            <li class="active"><a data-toggle="tab" href="#pagoNacional">Pago Nacional en Bs.</a></li>
                        @endif
                        @if (($cuenta->Evento->participacion == 'internacional' OR $cuenta->Evento->participacion == 'mixto'))
                            <li class="active"><a data-toggle="tab" href="#pagoInter"><img src="/images/mercadopago.ico" height="20px">Mercado Pago</a></li>
                        @endif
                    @endif
                </ul>

                <script>
                    function cambiarMSG1()  { $("#NFPago").html("Forma de Pago: Depósito en Efectivo<b class='caret'></b>");}
                    function cambiarMSG2()  { $("#NFPago").html("Forma de Pago: Transferencia<b class='caret'></b>");}
                    function cambiarMSG3()  { $("#NFPago").html("Forma de Pago: Depoósito en Cheque<b class='caret'></b>");}
                    function cambiarMSG4()  { $("#NFPago").html("Forma de Pago: TDC MisPagos.com<b class='caret'></b>");}
                    function RetornarIMG()  { 
                        $("#ImagenR").attr("src","/images/paybill.jpg");
                        $("#ImagenRMSG").html('');                    }
                    function ImagenRecibo() {
                        @foreach($bancosI as $bancoI)
                            if ($("#bancoID").val() == "{{ $bancoI->id }}") {
                                @if (!is_null($bancoI->recibo) AND $bancoI->recibo != "")
                                    $("#ImagenR").attr("src","/images/bancos/{{$bancoI->recibo}}");
                                    $("#ImagenRMSG").html('Por favor, preste atención a la imagen mostrada.<br><br><b>Si su depósito fue realizado por cajero Multiusos:</b><br>Indique Número de Movimiento como lo muestra la imagen de la izquierda.<br><br><b>Si su depósito fue realizado por la Taquilla Interna:</b><br>Indique número de Referencia como lo muestra la imagen derecha.');
                                @endif
                            }   
                        @endforeach
                    }
                </script>

                <div class="tab-content">
                    <div id="FPago5" class="tab-pane @if (Auth::user()->saldo > 0) in active @endif">
                        {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('clipaq_id', $clipaq->id) !!}
                        {!! Form::hidden('banco_id', "1") !!}
                        {!! Form::hidden('documento', "---") !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        {!! Form::hidden('evento_id', $Evento) !!}
                        {!! Form::hidden('formapago_id', "5") !!}
                        {!! Form::hidden('paquete_id', $Paquete) !!}
                        {!! Form::hidden('cheque', "N/A") !!}
                        {!! Form::hidden('cedula', "") !!}
                        {!! Form::hidden('cuenta', "") !!}
                        {!! Form::hidden('condicion', "1") !!}
                        {!! Form::hidden('obs', "") !!}
                        {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                        {!! Form::hidden('hora', date('H:i:s')) !!}

                        <div class="form-group">
                            {!! Form::label('monto','Monto:', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('monto', number_format($pagoC, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                            </div>
                            <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                            <div class="col-md-3">
                                 <div class='input-group date' id='fechaFPago5'>
                                    {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div> 

                    @if (($cuenta->Evento->participacion == 'nacional' OR $cuenta->Evento->participacion == 'mixto' ) AND Auth::user()->pais == "VE")
                        <div id="pagoNacional" class="tab-pane fade @if (Auth::user()->saldo == 0) in active @endif">
                            <div class="container">
                                <div class="col-sm-8">
                                    <ul class="nav nav-tabs">
                                        <li class="dropdown">
                                            <a id="NFPago" data-toggle="dropdown" class="dropdown-toggle" href="#">Forma de Pago: @if (Auth::user()->saldo > 0) Usar Saldo a Favor @else Depósito en Efectivo @endif<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a onclick="cambiarMSG1()" href="#FPago2" data-toggle="tab">Depósito en Efectivo</a></li>
                                                <li><a onclick="cambiarMSG3()" href="#FPago3" data-toggle="tab">Depósito en Cheque</a></li>
                                                <li><a onclick="cambiarMSG2()" href="#FPago1" data-toggle="tab">Transferencia</a></li>
                                                <li><a onclick="cambiarMSG4()" href="#FPago4" data-toggle="tab">TDC MisPagos.com</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="FPago2" class="tab-pane">
                                            {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                                            {!! Form::hidden('evento_id', $Evento) !!}
                                            {!! Form::hidden('formapago_id', "2") !!}
                                            {!! Form::hidden('paquete_id', $Paquete) !!}
                                            {!! Form::hidden('cheque', "N/A") !!}
                                            {!! Form::hidden('cedula', "") !!}
                                            {!! Form::hidden('cuenta', "") !!}
                                            {!! Form::hidden('condicion', "0") !!}
                                            {!! Form::hidden('obs', "") !!}
                                            {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                                            {!! Form::hidden('hora', date('H:i:s')) !!}

                                            <div class="form-group">
                                                {!! Form::label('banco','Banco:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('banco_id', $bancos, null, ['id' => 'bancoID', 'class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('documento','Referencia/Movimiento:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('documento', null, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Referencia', 'onfocusin' => 'ImagenRecibo()', 'onfocusout' => 'RetornarIMG()' ]) !!}
                                                </div>
                                                <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                                                <div class="col-md-3">
                                                     <div class='input-group date' id='fechaFPago2'>
                                                        {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('monto','Monto:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('monto', number_format($aPagar, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>   
                                        <div id="FPago1" class="tab-pane">
                                            {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                                            {!! Form::hidden('evento_id', $Evento) !!}
                                            {!! Form::hidden('cheque', "N/A") !!}
                                            {!! Form::hidden('formapago_id', "1") !!}
                                            {!! Form::hidden('paquete_id', $Paquete) !!}
                                            {!! Form::hidden('cuenta', "") !!}
                                            {!! Form::hidden('condicion', "0") !!}
                                            {!! Form::hidden('obs', "") !!}
                                            {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                                            {!! Form::hidden('hora', date('H:i:s')) !!}

                                            <div class="form-group">
                                                {!! Form::label('banco','Banco:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('banco_id', $bancos, null, ['id' => 'bancoID', 'class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            @php (
                                                $bancoT = [
                                                    '001' => '100% Banco',
                                                    '002' => 'Banco Activo',
                                                    '003' => 'Banco Mercantil',
                                                    '004' => 'Banco de Venezuela',
                                                    '005' => 'BBVA Banco Provincial',
                                                    '006' => 'Banesco',
                                                    '007' => 'BanCaribe',
                                                    '008' => 'Banco Agrícola de Venezuela',
                                                    '009' => 'Banco Caroní',
                                                    '010' => 'Banco Espírito Santo',
                                                    '011' => 'Banco del Tesoro',
                                                    '012' => 'Banco Exterior',
                                                    '013' => 'Banco Guayana',
                                                    '014' => 'Banco Internacional de desarrollo C.A.',
                                                    '015' => 'Banco Nacional de Crédito',
                                                    '016' => 'Banco Occidental de Descuento',
                                                    '017' => 'Banco Plaza',
                                                    '018' => 'Banco Sofitasa',
                                                    '019' => 'Banco Bicentenario',
                                                    '020' => 'Banplus',
                                                    '021' => 'Corp Banca C.A.',
                                                    '022' => 'Citibank',
                                                    '023' => 'BFC Banco Fondo Común',
                                                    '024' => 'Del Sur'
                                                ]
                                            )
                                            <div class="form-group">
                                                {!! Form::label('banco','Banco del Titular:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('cuenta', $bancoT, null, ['id' => 'bancoID', 'class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('cedula','Cédula del Titular:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-4">
                                                    {!! Form::text('cedula', null, ['class' => 'form-control', 'required', 'placeholder' => 'Cédula de Identidad']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('documento','Referencia/Movimiento:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('documento', null, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Referencia']) !!}
                                                </div>
                                                <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                                                <div class="col-md-3">
                                                     <div class='input-group date' id='fechaFPago1'>
                                                        {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('monto','Monto:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('monto', number_format($aPagar, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div> 
                                        <div id="FPago3" class="tab-pane">
                                            {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                                            {!! Form::hidden('evento_id', $Evento) !!}
                                            {!! Form::hidden('formapago_id', "3") !!}
                                            {!! Form::hidden('paquete_id', $Paquete) !!}
                                            {!! Form::hidden('cedula', "") !!}
                                            {!! Form::hidden('cuenta', "") !!}
                                            {!! Form::hidden('condicion', "0") !!}
                                            {!! Form::hidden('obs', "") !!}
                                            {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                                            {!! Form::hidden('hora', date('H:i:s')) !!}

                                            <div class="form-group">
                                                {!! Form::label('banco','Banco:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('banco_id', $bancos, null, ['id' => 'bancoID', 'class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('documento','Referencia/Movimiento:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('documento', null, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Referencia', 'onfocusin' => 'ImagenRecibo()', 'onfocusout' => 'RetornarIMG()' ]) !!}
                                                </div>
                                                <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                                                <div class="col-md-3">
                                                     <div class='input-group date' id='fechaFPago3'>
                                                        {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('cheque','Número de Cheque:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-4">
                                                    {!! Form::text('cheque', null, ['class' => 'form-control', 'required', 'placeholder' => 'Número de Cheque']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('monto','Monto:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('monto', number_format($aPagar, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div id="FPago4" class="tab-pane">
                                            {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                                            {!! Form::hidden('evento_id', $Evento) !!}
                                            {!! Form::hidden('formapago_id', "4") !!}
                                            {!! Form::hidden('paquete_id', $Paquete) !!}
                                            {!! Form::hidden('cheque', "N/A") !!}
                                            {!! Form::hidden('cedula', "") !!}
                                            {!! Form::hidden('banco_id', "3") !!}
                                            {!! Form::hidden('cuenta', "") !!}
                                            {!! Form::hidden('condicion', "0") !!}
                                            {!! Form::hidden('obs', "") !!}
                                            {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                                            {!! Form::hidden('hora', date('H:i:s')) !!}

                                            <div class="form-group">
                                                {!! Form::label('documento','No. de Transacción:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('documento', null, ['class' => 'form-control', 'required', 'placeholder' => 'No. de Transacción']) !!}
                                                </div>
                                                <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                                                <div class="col-md-3">
                                                     <div class='input-group date' id='fechaFPago4'>
                                                        {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('monto','Monto:', ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-3">
                                                    {!! Form::text('monto', number_format($aPagar, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br><br>
                                    <img id="ImagenR" src="/images/paybill.jpg" width="290" style="border: 1px solid;">
                                    <br><br>
                                    <p style="margin-right: 40px;" id="ImagenRMSG"></p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (($cuenta->Evento->participacion == 'internacional' OR $cuenta->Evento->participacion == 'mixto' ) AND Auth::user()->pais <> "VE")
                        <div id="pagoInter" class="tab-pane fade @if (Auth::user()->saldo == 0) in active @endif">  
                            <div class="container">
                                <div class="col-sm-4">
                                    <img src="/images/mercadopago.jpg" width="290">
                                    <br><br>
                                    <p style="margin-right: 40px;" id="ImagenRMSG"></p>
                                </div>
                                <div class="col-sm-8">
                                    {!! Form::open(['route' => 'banco.regpago', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
                                    {!! Form::hidden('clipaq_id', $clipaq->id) !!}
                                    {!! Form::hidden('banco_id', "1") !!}
                                    {!! Form::hidden('documento', "---") !!}
                                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                                    {!! Form::hidden('evento_id', $Evento) !!}
                                    {!! Form::hidden('formapago_id', "6") !!}
                                    {!! Form::hidden('paquete_id', $Paquete) !!}
                                    {!! Form::hidden('cheque', "N/A") !!}
                                    {!! Form::hidden('cedula', "") !!}
                                    {!! Form::hidden('cuenta', "") !!}
                                    {!! Form::hidden('condicion', "0") !!}
                                    {!! Form::hidden('obs', "") !!}
                                    {!! Form::hidden('fechaRegi', date("Y-m-d")) !!}
                                    {!! Form::hidden('hora', date('H:i:s')) !!}
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('monto','Monto:', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-3">
                                            {!! Form::text('monto', number_format($pagoC, 2, ",", "."), ['class' => 'form-control money', 'required', 'style' => 'text-align:right', 'placeholder' => '0,00' ]) !!}
                                        </div>
                                        <label for="fechaTrans" class="col-sm-2 control-label">Fecha:</label>
                                        <div class="col-md-3">
                                             <div class='input-group date' id='fechaFPago6'>
                                                {!! Form::text('fechaTrans', date('d-m-Y'), ['class' => 'form-control', 'placeholder' => 'DD/MM/AAA', 'required' ]) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-8">
                                            {!! Form::submit('Registrar Pago', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
