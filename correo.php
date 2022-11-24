<?php

include ("./includes/App.php");

    $_post = json_decode(file_get_contents('php://input'),true);

    $destinatario = $_SESSION['usuarioEmail'];

    $nombre = $_post['nombres'];
    $apellido_paterno = $_post['apellido_paterno'];
    $apellido_materno = $_post['apellido_materno'];
    $fecha = $_post['horario'];
    $mensaje = $_post['mensaje'];
    $email = $_SESSION['usuarioEmail'];


    //variables para los datos del archivo
    
    $fechaFormato = date("j/n/Y");


    //asunto del correo
    $asunto = "Enviado por  Farmacias Similares ";


    // -> mensaje en formato Multipart MIME
    $cabecera = "MIME-VERSION: 1.0\r\n";
    $cabecera .= "Content-type: multipart/mixed;";
    $cabecera .= "boundary=\"=C=T=E=C=\"\r\n";
    $cabecera .= "From: {farmacias_simi@xd.com}";

    //Primera parte del cuerpo del mensaje
    $cuerpo = "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $cuerpo .= "\r\n"; // línea vacía
    $cuerpo .= "Correo enviado por: farmacias similares"  ;
    $cuerpo .= " con fecha: " . $fechaFormato . "\r\n";
    $cuerpo .= "Email: " . $email . "\r\n";
    $cuerpo .= "Mensaje: Su cita a sido reservada para el siguiente horario $fecha"  . "\r\n";
    $cuerpo .= "Lo esperamos y esperamos verlo pronto";
    $cuerpo .= "\r\n"; // línea vacía

    // -> segunda parte del mensaje (archivo adjunto)
    //    -> encabezado de la parte
    $cuerpo .= "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-Type: application/octet-stream; ";
    #$cuerpo .= "name=" . $nameFile . "\r\n";
    $cuerpo .= "Content-Transfer-Encoding: base64\r\n";
    $cuerpo .= "Content-Disposition: attachment; ";
    #$cuerpo .= "filename=" . $nameFile . "\r\n";
    $cuerpo .= "\r\n"; // línea vacía

    /*
    $fp = fopen($tempFile, "rb");
    $file = fread($fp, $sizeFile);
    $file = chunk_split(base64_encode($file));
    


    $cuerpo .= "$file\r\n";
    $cuerpo .= "\r\n"; // línea vacía
    // Delimitador de final del mensaje.
    */
    $cuerpo .= "--=C=T=E=C=--\r\n";

    //Enviar el correo
    if (mail($email, $asunto, $cuerpo, $cabecera)) {
        echo "Correo enviado";
    } else {
        echo "Error de envio";
    }
