<?php
require("conexion.php"); // Incluir el archivo con la configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';

    // Verificar que se proporcionaron los datos necesarios
    if (!empty($nombre) && !empty($correo)) {
        // Buscar en la base de datos por nombre
        $consulta = "SELECT * FROM Usuarios WHERE nombre = ?";
        $stmt = $conn->prepare($consulta);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Generar un token aleatorio para el restablecimiento de contraseña
            $token = bin2hex(random_bytes(32));

            // Actualizar el token en la base de datos
            $consulta = "UPDATE Usuarios SET token = ? WHERE nombre = ?";
            $stmt = $conn->prepare($consulta);
            $stmt->bind_param("ss", $token, $nombre);
            $stmt->execute();

            // Configurar el correo electrónico
            $destinatario = $correo;
            $asunto = "Restablecimiento de contraseña";
            $mensaje = "Hola $nombre,\n\n";
            $mensaje .= "Hemos recibido una solicitud para restablecer tu contraseña. ";
            $mensaje .= "Haz clic en el siguiente enlace para establecer una nueva contraseña:\n";
            $mensaje .= "https://tudominio.com/restablecer_contraseña.php?token=$token\n\n";
            $mensaje .= "Si no solicitaste restablecer tu contraseña, puedes ignorar este correo.\n\n";
            $mensaje .= "Saludos,\n";
            $mensaje .= "Tu equipo de soporte";

            // Enviar el correo electrónico
            $headers = "From: tu@email.com\r\n";
            $headers .= "Reply-To: tu@email.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            if (mail($destinatario, $asunto, $mensaje, $headers)) {
                echo "<script>alert('Se ha enviado un correo electrónico con las instrucciones para restablecer la contraseña.');</script>";
            } else {
                echo "<script>alert('Error al enviar el correo electrónico. Por favor, intenta nuevamente más tarde.');</script>";
            }
        } else {
            echo "<script>alert('No se encontró un usuario con el nombre proporcionado.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();



