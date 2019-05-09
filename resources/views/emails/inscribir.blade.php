<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>FUNDAEOE - Inscripción al Evento</h2>
        <div>
            ¡Hola {!! $primerNombre . ' ' . $primerApellido !!} Usted ha realizado la inscripción en uno de nuestros eventos realizados por la Fundación el Observatorio Estudiantil (FUNDAEOE).<br><br>
            Los datos del evento son:<br><br>
            <table>
                <tr>
                    <td width="10%"></td>
                    <td width="20%">INSCRIPCIÓN No.:</td>
                    <td width="60%">{!! $id !!}</td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="20%">EVENTO:</td>
                    <td width="60%">{!! $evento !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>FECHA:</td>
                    <td>{!! $fecha !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>PAQUETE:</td>
                    <td>{!! $paquete !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>ETAPA:</td>
                    <td>{!! $etapaTitulo !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>COSTO:</td>
                    <td>{!! number_format($costo, 2, ",", ".") !!}</td>
                </tr>
            </table>
        </div> 
        <br><br><br>
        <div>
            PARA MAYOR INFORMACIÓN COMUNICATE CON NOSOTROS VÍA EMAIL: FUNDAEOE@GMAIL.COM O A NUESTROS TELÉFONOS DE CONTACTO: 0274 9350884 / 0414 7482503 / 0416 9794842, SI TE ENCUENTRAS FUERA DE VENEZUELA DEBES MARCAR +58274 9350884 / +58414 7482503 / +58416 9794842 <BR>
            FUNDACIÓN EL OBSERVATORIO ESTUDIANTIL - FUNDAEOE <BR>
            GRACIAS POR PREFERIRNOS.
        </div>
    </body>
</html>
