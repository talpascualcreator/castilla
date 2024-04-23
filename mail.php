<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y limpiar los datos del formulario
    $nombre = limpiarInput($_POST["nombre"]);
    $correo = limpiarInput($_POST["correo"]);
    $asunto = limpiarInput($_POST["asunto"]);
    $mensaje = limpiarInput($_POST["mensaje"]);

    // Validar los datos
    if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        die("Por favor, completa todos los campos del formulario.");
    }

    // Validar la dirección de correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("La dirección de correo electrónico no es válida.");
    }

    // Correo al que se enviará la información
    $destinatario = "stevenhijo@gmail.com";

    // Encabezados del correo
    $encabezados = "From: $correo\r\n";
    $encabezados .= "Reply-To: $correo\r\n";

    // Contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo electrónico: $correo\n";
    $contenido .= "Asunto: $asunto\n";
    $contenido .= "Mensaje: $mensaje\n";

    // Enviar el correo
    if (@mail($destinatario, $asunto, $contenido, $encabezados)) {
        // Puedes redirigir al usuario a una página de agradecimiento
        header("Location: index.html");
        exit();
    } else {
        die("Hubo un problema al enviar el correo. Por favor, inténtalo de nuevo más tarde.");
    }
}

// Función para limpiar los datos de entrada
function limpiarInput($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}








