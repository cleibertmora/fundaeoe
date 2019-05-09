@extends('template.main')



@section('title', 'Lista de Certificados')

@section('content')

<section id="blog">
    
    <div class="container">
    
    	<div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Mis Certificados</h2>
            <p class="text-center wow fadeInDown">Aquí podrá verificar los certificados que tiene en nuestra institución y descargarlos.</p>
        </div>
    
        @if(isset($certificates))
        
        	<table class="table table-striped text-center">
        
        		<thead>
        
        			<th width="25%" style="text-align: center">Nombre de Usuario</th>
        
        			<th width="25%" style="text-align: center">Evento</th>
        
        			<th width="10%" style="text-align: center">Fecha</th>
        
        			<th width="15%" style="text-align: center">Acciones</th>
        
        		</thead>
        
        		<tbody>
        
        		    @foreach($certificates as $certificate)
        
        				<tr>
        
        					<td style="text-align:left">
        						{{ $certificate->fullName }}
        						<br><span class="label label-info"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ $certificate->documento }}</span>
        					</td>
        
        					<td style="vertical-align:middle">{{ $certificate->titulo }}</td>
        
        					<td style="vertical-align:middle">{{ $certificate->fecha }}</td>
        
        					<td style="vertical-align:middle">
        
        						<a href="/certificados/{{ $certificate->path }}" target="_blank" class="btn btn-primary">
        
                                    <span class="glyphicon glyphicon-search" style="font-size:18px; vertical-align: middle;" aria-hidden="true"></span></a>
        
        					</td>
        
        				</tr>
        
        			@endforeach
        
        		</tbody>
        
        	</table>
        	
        @else
        
            <p>Ningún certificado que mostrar...</p>
    	
    	@endif
    
    </div>
    
</section>

@endsection