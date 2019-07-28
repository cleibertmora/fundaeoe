<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/FUNDAEOE.png" alt="logo"></a>
            </div>
    
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll @if (Request::path()=='/') active @endif"><a href="/">Inicio</a></li>
                    <li class="scroll @if (substr(Request::path(),0,7)=='eventos' OR 
                                           substr(Request::path(),0,12)=='admin/evento') active @endif"><a href="{{ route('eventos.index') }}">Eventos</a></li>
                    <li class="scroll @if (substr(Request::path(),0,7)=='galeria') active @endif"><a href="{{ route('galeria.index') }}">Galeria</a></li>
                    @if (Request::path()=='/')
                      <li class="scroll"><a href="#contacto">Contactos</a></li>
                    @endif
                    <li class="scroll @if (substr(Request::path(),0,7)=='galeria') active @endif"><a href="{{ route('certificados.index') }}">Consultas</a></li>
                    @if (Auth::guest())
                        <li class="scroll @if (Request::path()=='register') active @endif"><a href="{{ route('register') }}">Registro</a></li>
                        <li class="scroll" style="background-color: #78ceff">
                          <a type="button" class="btn" data-toggle="modal" data-target="#myModal">Entrar</a>
                        </li>
                    @else
                        @if (!Auth::guest())
                          <li style="background-color: #78ceff" class="scroll"><a href="/users/eventos">Mis Eventos</a></li>
                        @endif
                        @if (Auth::user()->admin())
                        <li class="dropdown">
                          <a href="#" style="background-color: #78ceff" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administración <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('banco.index') }}">Bancos</a></li>
                            <li><a href="{{ route('formaPago.index') }}">Formas de Pago</a></li>
                            <li><a href="{{ route('instituto.index') }}">Instituciones</a></li>
                            <li><a href="{{ route('ponente.index') }}">Ponentes</a></li>
                            <li><a href="{{ route('material.index') }}">Materiales</a></li>
                            <li><a href="{{ route('politica.index') }}">Políticas</a></li>
                            <li><a href="{{ route('evento.index') }}">Eventos</a></li>
                            <li><a href="{{ route('pagos.index') }}">Pagos</a></li>
                            <li><a href="{{ route('certificado.index') }}">Certificados</a></li>
                            <li><a href="{{ route('rifas.index') }}">Rifas</a></li>
                          </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" style="background-color: #78ceff" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->primerNombre }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('certificate.show', Auth::user()->id) }}">
                                      Mis Certificados
                                    </a>
                                </li>
                                <li>
                                  <a href="{{ route('tickets.index', 'id=' . Auth::user()->id) }}">
                                    Tickets - Rifas
                                  </a>
                              </li>
                                <li>
                                    <a href="{{ route('users.editU', Auth::user()->id) }}">
                                      Datos del Usuario
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header>

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 8%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresa Aquí</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ isset($errors) ? ( $errors->has('email') ? ' has-error' : '') : '' }}">
            <label for="email" class="col-md-2 control-label">E-Mail</label>
            <div class="col-md-10">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              @if (isset($errors))
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>Error en el correo ó password</strong>
                </span>
              @endif
              @endif
            </div>
          </div>
          <div class="form-group{{ isset($errors) ? ( $errors->has('password') ? ' has-error' : '') : '' }}">
            <label for="password" class="col-md-2 control-label">Password</label>
            <div class="col-md-10">
              <input id="password" type="password" class="form-control" name="password" required>
              @if (isset($errors))
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Recuerdame
                </label>
              </div>
               <a class="btn btn-link" href="{{ route('password.request') }}">Olvido la contraseña?</a>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

@if (!Auth::guest())

  @if (Auth::user()->admin())

  <div class="tasa">
    
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="alert alert-danger" role="alert">
          
        <input type="hidden" value="{{ route('fijarTasaGet') }}" id="getTasaUrl">
  
          <form class="form-inline" action="{{ route('fijarTasa') }}" id="tasaCambio">
            <div class="form-group">
              <label for="tasaValue"><span class="glyphicon glyphicon-object-align-bottom" aria-hidden="true"></span><b> Fijar Tasa de Cambio del Día</b>: $1 = a Bs.</label>
              <input type="text" class="form-control" id="tasaValue" placeholder="3000.00">
              <input type="text" name="idTasaCambio" id="idTasaCambio" hidden>
            </div>
            <button type="submit" class="btn btn-primary">Fijar</button>
          </form>

        </div>
      </div>
    </div>

  </div>
  
  @endif

@endif