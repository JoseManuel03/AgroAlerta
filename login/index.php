<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Ludiflex | Login & Registration</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>LOGO .</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="#" class="link active">Inicio</a></li>
                <li><a href="#" class="link">Servicios</a></li>
                <li><a href="#" class="link">Contacto</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Iniciar Sesión</button>
            <button class="btn" id="registerBtn" onclick="register()">Crear Cuenta</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <div class="form-box">
        <div class="login-container" id="login">
            <form action="login.php" method="post">
                <div class="top">
                    <span>¿No tienes cuenta? <a href="#" onclick="register()">Crear una nueva cuenta</a></span>
                    <header>Inicio de Sesión</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Correo" name="Correo">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Contrasena" name="Contrasena">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Iniciar Sesión">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Recordar Cuenta</label>
                    </div>
                    <div class="two">
                        <label><a href="#">¿Olvidaste tu Contraseña?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <div class="register-container" id="register">
            <form action="registro.php" method="post">
                <div class="top">
                    <span>¿Ya tienes cuenta? <a href="#" onclick="login()">Inicia Sesión</a></span>
                    <header>Crear Cuenta</header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nombre" name="nombre">
                        <i class="bx bx-user"></i>
                    </div>
                    
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Correo Electrónico" name="correo">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Contraseña" name="contraseña">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Ubicación" name="ubicacion">
                    <i class="bx bx-location-plus"></i>
                </div>
                <div class="input-box">
                    <select class="input-field" name="tipo_usuario">
                        <option value="" disabled selected>Tipo de Usuario</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Administrador">Agronomo</option>
                    </select>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Registrarte">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check">Recordar Cuenta</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Términos y Condiciones</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>   

<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>



</body>
</html>
