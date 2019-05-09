<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>FUNDAEOE - Registro completado</h2>
        <div>
            ¡Hola {!! $primerNombre . ' ' . $primerApellido !!} Usted se ha registrado como usuario en el Portal de la Fundación el Observatorio Estudiantil (FUNDAEOE).<br><br>
            Este procedimiento de Registro no es necesario volverlo a repetir, por favor conserve esta información para futuras consultas.<br><br>
            Sus datos de inicio de sesión son:<br><br>
            <table>
                <tr>
                    <td width="10%"></td>
                    <td width="20%">USUARIO:</td>
                    <td width="60%">{!! $email !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>CONTRASEÑA:</td>
                    <td>{!! $contrasena !!}</td>
                </tr>
            </table>
        </div> 
        <br><br><br>
        <h3>Procedimiento para inscripción a Eventos</h3>
        <div>
            PASO 1.- Desde la página WWW.FUNDAEOE.ORG haga clic en 'Eventos' <br>
            PASO 2.- Selecciona el evento de su preferencia y ahaga clic sobre el título del evento, lea la informacón y continue haciendo clic en el botón 'Inscribirme'<br>
            PASO 3.- El sistema solicitará los datos para inicio de sesión, son los mismos que le hemos enviado en este correo
        </div>
        <br><br><br><br>
        <div>
            Si tiene alguna pregunta, duda o sugerencia por favor contáctanos vía correo a fundaeoe@gmail.com ó vía telefónica: +58 414.748.25.03 / +58 416.979.48.42 / +58 274.935.08.84 / +58 274.252.75.14
        </div>
        <br><br>
        <div>
            ¡GRACIAS!
        </div>
    </body>
</html>
