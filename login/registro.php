<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y procesar los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $ubicacion = $_POST["ubicacion"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $contraseña = $_POST["contraseña"];

    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "agroalerta";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Hash de la contraseña antes de guardarla en la base de datos
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar los datos del usuario en la tabla 'usuarios'
    $sql = "INSERT INTO Usuarios (Nombre, Correo, Ubicacion, TipoUsuario, Contrasena) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $correo, $ubicacion, $tipo_usuario, $contraseña_hash);

    if ($stmt->execute()) {
        // Registro exitoso, redirigir al usuario a una página de éxito
        header("Location: index.php?registro=exitoso");
        exit();
    } else {
        // Error al registrar, mostrar un mensaje de error o redirigir al usuario a otra página
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}

// Si alguien intenta acceder directamente a este archivo, redirigirlo al formulario de registro
header("Location: index.php");
exit();
?>
