<?php

namespace Controllers;
use MVC\Router;
use Model\Articulo;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index( Router $router ) {

        $articulos = Articulo::get(3);

        $router->render('paginas/index', [
            'inicio' => true,
            'articulos' => $articulos
        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function articulos( Router $router ) {

        $articulos = Articulo::all();

        $router->render('paginas/articulos', [
            'articulos' => $articulos
        ]);
    }

    public static function articulo(Router $router) {
        $id = validarORedireccionar('/articulos');

        // Obtener los datos del artículo
        $articulo = Articulo::find($id);

        $router->render('paginas/articulo', [
            'articulo' => $articulo
        ]);
    }

    public static function ubicanos( Router $router ) {

        $router->render('paginas/ubicanos');
    }

    public static function entrada( Router $router ) {
        $router->render('paginas/entrada');
    }


    public static function contacto( Router $router ) {
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Validar 
            $respuestas = $_POST['contacto'];
        
            // create a new object
            $mail = new PHPMailer();
            // configure an SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3620927a5f0453';
            $mail->Password = 'ca6720e0ec0050';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
        
            $mail->setFrom('correoverdeplata@gmail.com', $respuestas['nombre']);
            $mail->addAddress('correoverdeplata@gmail.com', 'verdeplata.com');
            $mail->Subject = 'Tienes un Nuevo Email';
            // Set HTML 
            $mail->isHTML(TRUE);
            $mail->CharSet = 'UTF-8'; 

            $contenido = '<html>';
            $contenido .= "<p><strong>Has Recibido un email:</strong></p>";
            $contenido .= "<p>Nombre: " . $respuestas['nombre'] . "</p>";
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . "</p>";
            $contenido .= "<p>Escoge un plan: " . $respuestas['opciones'] . "</p>";
            $contenido .= "<p>Presupuesto o Precio: $" . $respuestas['presupuesto'] . "</p>";

            if($respuestas['contacto'] === 'telefono') {
                $contenido .= "<p>Eligió ser Contactado por: Teléfono</p>";
                $contenido .= "<p>Su teléfono es: " .  $respuestas['telefono'] ." </p>";
                $contenido .= "<p>En la Fecha y hora: " . $respuestas['fecha'] . " - " . $respuestas['hora']  . " Horas</p>";
            } else {
                $contenido .= "<p>Eligio ser Contactado por: Email</p>";
                $contenido .= "<p>Su Email  es: " .  $respuestas['email'] ." </p>";
            }

            $contenido .= '</html>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo';

            

            // send the message
            if(!$mail->send()){
                $mensaje = 'Hubo un Error... intente de nuevo';
            } else {
                $mensaje = 'Email enviado Correctamente';
            }

        }
        
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}