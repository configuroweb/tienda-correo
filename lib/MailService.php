<?php

namespace Phppot;

class MailService
{

    function sendUserEmail($orderResult, $recipientArr)
    {
        $name = $orderResult[0]["name"];
        $email = $orderResult[0]["email"];
        $orderId = $orderResult[0]["order_id"];
        $subject = "Confirmación de Orden";
        $content = "Hola, te informo que has realizado tu pedido con éxito, la identificación de referencia del pedido es $orderId. Mi equipo se pondrá en contacto en breve. 

Gracias por tu Confianza y Soporte.
        
Si tienes dudas me puedes contactar directamente en el siguiente enlace: https://configuroweb.com/WhatsappMessenger
        
Equipo ConfiguroWeb";

        $toEmail = implode(',', $recipientArr);
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        $response = mail($toEmail, $subject, $content, $mailHeaders);
        if ($response) {
            echo "<div class='success'><h1>Gracias por tu Compra.</h1>
            Tu pedido se ha realizado efectivamente, el número de referencia de tu orden es: <b>" . $orderId . ".</b><br/>
            Te contactaremos en breve</div>";
        } else {
            echo "<div class='Error'>Problema con el envío de correo.</div>";
        }

        return $response;
    }

    function sendAdminEmail($orderItemResult, $orderResult)
    {
        $name = $orderItemResult[0]["name"];
        $email = $orderResult[0]["email"];
        $currency = $orderResult[0]["currency"];
        $orderId = $orderItemResult[0]["order_id"];
        $price = $orderItemResult[0]["item_price"];
        $subject = "Nuevo pedido realizado";
        $content = "Tu pedido se ha realizado efectivamente, el número de referencia de tu orden es $orderId.\n\nNombre del Producto: $name.\nPrice: $currency $price";

        $toEmail = Config::ADMIN_EMAIL;
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        $response = mail($toEmail, $subject, $content, $mailHeaders);
        return $response;
    }
}
