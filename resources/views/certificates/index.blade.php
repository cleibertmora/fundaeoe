@extends('template.main')

@section('title','Consultar Certificados')
@section('content')
<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Consultar Certificados</h2>
            <p class="text-center wow fadeInDown">Por favor ingrese su número de identificación (sin puntos, solo números) en el buscador para verificar si tiene certificados acreditados por nuestra fundación.</p>
        </div>

        <section class="space-between">
    
            {!! Form::open(['route' => 'certificados.index', 'method' => 'GET', 'class' => '']) !!}
    
              <div class="input-group">
    
                {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Cédula o documento de identificación', 'aria-describedby' => 'search']) !!}
    
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>    
              
              </div>
    
            {!! Form::close() !!}
        
        </section>
        
        @if(isset($certificates))
            
            @if(count($certificates)>0)
              
                @foreach($certificates as $certificate)    
                    
                    <section class="space-between">
                        
                        <div class="panel panel-default">
                          <div class="panel-heading">Certificado Fundaeoe</div>
                          <div class="panel-body">
                              <p>
                                  Nombre: {{ $certificate->fullName }}<br>
                                  Evento: {{ $certificate->titulo }}<br>
                                  fecha: {{ $certificate->fecha }}<br>
                              </p>
                              <p class="alert alert-warning text-center" role="alert">
                                  Por favor para descargar su certificado ingrese a su cuenta y haga click en la opción "Mis Certificados".
                              </p>
                          </div>
                        </div>
                        
                    </section>
                
                @endforeach
                
            @else
            
                <section class="space-between">
                    
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <p class="alert alert-danger text-center" role="alert">
                              El número: <b>{{ $cedula }}</b> de cédula o documento de identificación no esta registrado en ninguno de nuestros certificados.
                          </p>
                      </div>
                    </div>
                    
                </section>
            
            @endif
        
        @endif
        
    </div>
</section>
@endsection