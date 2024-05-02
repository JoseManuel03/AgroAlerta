<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han recibido los campos de correo y contraseña
    if (isset($_POST["Correo"]) && isset($_POST["Contrasena"])) {
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

        // Limpiar los datos recibidos del formulario para evitar inyección SQL
        $correo = $conn->real_escape_string($_POST["Correo"]);
        $contraseña = $conn->real_escape_string($_POST["Contrasena"]);

        // Consulta SQL para verificar las credenciales del usuario en la base de datos
        $sql = "SELECT * FROM Usuarios WHERE Correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El usuario fue encontrado, verificar la contraseña
            $row = $result->fetch_assoc();
            if (password_verify($contraseña, $row["Contrasena"])) {
                // Autenticación exitosa, redirigir al usuario a alguna página de éxito o hacer lo que necesites
                header("Location: bienvenido.php");
                exit();
            } else {
                // Autenticación fallida, puedes mostrar un mensaje de error o redirigir de nuevo al formulario de inicio de sesión
                header("Location: index.php?error=1");
                exit();
            }
        } else {
            // El usuario no fue encontrado en la base de datos
            header("Location: index.php?error=1");
            exit();
        }

        // Cerrar la conexión
        $conn->close();
    }
}

// Si alguien intenta acceder directamente a este archivo, redirigirlo al formulario de inicio de sesión
header("Location: index.php");
exit();
?>
