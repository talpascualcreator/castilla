<?php
session_start(); // Inicia la sesión

// Verificar si se ha enviado un correo electrónico
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "vmusica");

    // Verifica si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener el correo electrónico del formulario
    $correo = isset($_POST['email']) ? $_POST['email'] : '';

    // Consulta SQL para verificar si el correo electrónico existe en la base de datos
    $consulta = "SELECT nombre FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nombre);

    if (mysqli_stmt_fetch($stmt)) {
        // Generar un token único
        $token = uniqid();

        // Guardar el token en la base de datos junto con el correo electrónico del usuario
        $consulta = "UPDATE usuarios SET token = ? WHERE correo = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ss", $token, $correo);
        mysqli_stmt_execute($stmt);

        // Enviar un correo electrónico al usuario con un enlace único que contenga el token generado
        $asunto = "Restablecer Contraseña";
        $mensaje = "Hola $nombre,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace:\n\n";
        $mensaje .= "http://tudominio.com/reset_password.php?token=$token\n\n";
        $mensaje .= "Si no solicitaste restablecer tu contraseña, puedes ignorar este correo.\n\n";
        $mensaje .= "Saludos,\nTu Equipo de Veredas Musicales";
        $encabezados = "From: stevenhijo@gmail.com\r\n";
        $encabezados .= "Reply-To: stevenhijo@gmail.com\r\n";
        mail($correo, $asunto, $mensaje, $encabezados);

        echo "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
    } else {
        echo "El correo electrónico proporcionado no está asociado a ninguna cuenta.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    // Si se intenta acceder directamente a reset_password.php sin enviar un correo electrónico, redirige al formulario
    header("Location: reset_password_form.php");
    exit();
}





