<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $data = ["homePage" => true, "propiedades" => $propiedades];
        $router->render("paginas/index", $data);
    }
    //
    public static function aboutus(Router $router)
    {
        $router->render("paginas/nosotros");
    }
    //
    public static function properties(Router $router)
    {
        $propiedades = Propiedad::all();
        $data = ["propiedades" => $propiedades];

        $router->render("paginas/propiedades", $data);
    }
    //
    public static function property(Router $router)
    {
        $id = validateIdOrRedirect("/propiedades");
        $propiedad = Propiedad::findById($id);
        if (!$propiedad) header("location: /propiedades");
        $data = ["propiedad" => $propiedad];
        $router->render("paginas/propiedad", $data);
    }
    //
    public static function blog(Router $router)
    {
        $router->render("paginas/blog");
    }
    //
    public static function entry(Router $router)
    {
        $router->render("paginas/entrada");
    }
    //
    public static function contact(Router $router)
    {
        $message = '';
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $_POST["contacto"];
            //instance of php mailer
            $mail = new PHPMailer(true);
            //settings for SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '3a249139007f78';
            $mail->Password = '31577d65d015b6';
            $mail->SMTPSecure = 'tls';
            //set email
            $mail->setFrom("admin@bienesraices.com", "admin");
            $mail->addAddress("ximir91620@bulatox.com", "bienesraices.com");
            $mail->Subject = "Nuevo mensaje desde bienes raices";
            //allow HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            //HTML  contenido  with inline styles
            $content = '<html>';
            $content .= '<body style="font-family: Arial, sans-serif; color: #333;">';

            // Título con fondo y bordes
            $content .= '<div style="background-color: #f8b400; color: #fff; padding: 20px; border-radius: 5px;">';
            $content .= '<h1 style="text-align: center; margin: 0; font-size: 24px;">Nuevo mensaje desde Bienes Raíces</h1>';
            $content .= '</div>';

            // Nombre del remitente con estilos
            $content .= '<h3 style="color: #007bff; font-size: 20px;">Nombre: <span style="color: #333;">' . $data["nombre"] . '</span></h3>';

            // Tipo de asunto
            $content .= '<p style="font-size: 18px; color: #444;">Tipo de asunto: <span style="font-weight: bold;">' . $data["tipo"] . '</span></p>';

            // Precio o presupuesto
            $content .= '<p style="font-size: 18px; color: #444;">Precio o presupuesto: <span style="color: #28a745; font-weight: bold;">$' . $data["precio"] . '</span></p>';

            // Mensaje
            $content .= '<div style="background-color: #e9ecef; padding: 15px; border-left: 5px solid #f8b400; margin-top: 20px;">';
            $content .= '<p style="font-size: 16px; color: #333;">' . nl2br($data["mensaje"]) . '</p>';
            $content .= '</div>';

            // Contactar por teléfono o email
            if ($data["contactar"] === "telefono") {
                $content .= '<p style="font-size: 18px;">Contacto por teléfono:</p>';
                $content .= '<p style="font-size: 16px; color: #007bff;">Teléfono: ' . $data["telefono"] . '</p>';
                $content .= '<p style="font-size: 16px; color: #6c757d;">Fecha y hora disponible: ' . $data["fecha"] . ' || ' . $data["hora"] . '</p>';
            }
            if ($data["contactar"] === "e-mail") {
                $content .= '<p style="font-size: 18px;">Contacto por e-mail:</p>';
                $content .= '<p style="font-size: 16px; color: #007bff;">Correo: ' . $data["email"] . '</p>';
            }

            $content .= '</body>';
            $content .= '</html>';
            //email body
            $mail->Body = $content;

            // Plain text content for non-HTML email clients
            $mail->AltBody = "Nuevo mensaje desde Bienes Raíces\n\n" .
                "Nombre: " . $data["nombre"] . "\n" .
                "Tipo de asunto: " . $data["tipo"] . "\n" .
                "Precio o presupuesto: $" . $data["precio"] . "\n" .
                "Mensaje: " . $data["mensaje"] . "\n";

            if ($data["contactar"] === "telefono") {
                $mail->AltBody .= "Contacto por teléfono\n";
                $mail->AltBody .= "Teléfono: " . $data["telefono"] . "\n";
                $mail->AltBody .= "Fecha y hora disponible: " . $data["fecha"] . " || " . $data["hora"] . "\n";
            }

            if ($data["contactar"] === "e-mail") {
                $mail->AltBody .= "Contacto por e-mail\n";
                $mail->AltBody .= "Correo: " . $data["email"] . "\n";
            }

            //send mail
            if ($mail->send()) {
                $message = "El email fue enviado correctamente ;)";
            } else {
                $message = "No se puedo enviar :c";
            }
        }
        $router->render("paginas/contacto", ["message" => $message]);
    }
}
