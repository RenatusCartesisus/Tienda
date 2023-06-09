<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("location: index.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/validation.css">
    <script src="https://kit.fontawesome.com/d3ae0c1cce.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="php/registrar.php" method="post" id="form-register">
                <h1>Crear Cuenta</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-github"></i></a>
                </div>
                <div class="input-control" style="display: inline;">
                    <span>o usa tu correo electrónico</span>
                    <input type="text" placeholder="Nombre" name="nombre" id="nombre">
                    <div class="error"><?php if(isset($_SESSION['nombre_fallo'])){ echo $_SESSION['nombre_fallo']; echo "<script>container.classList.add('right-panel-active');</script>" ;}?></div>
                    <input type="text" placeholder="Email" name="email" id="email">
                    <div class="error"><?php if(isset($_SESSION['correo_fallo'])) echo $_SESSION['correo_fallo']; ?></div>
                    <input type="text" placeholder="Usuario" name="usuario" id="usuario">
                    <div class="error"><?php if(isset($_SESSION['usuario_fallo'])) echo $_SESSION['usuario_fallo']; ?></div>
                    <input type="password" placeholder="Contraseña" name="pass" id="pass">
                    <div class="error"><?php if(isset($_SESSION['pass_fallo'])) echo $_SESSION['pass_fallo']; ?></div>
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="php/login.php" method="post">
                <h1>Iniciar sesión</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-github"></i></a>
                </div>

                <span>o usa tu cuenta</span>
                <input type="email" placeholder="Email" name="email" >
                <input type="password" placeholder="Contraseña" name="pass">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <input type="submit" value="Iniciar sesión">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Hola de vuelta!</h1>
                    <p>Para mantenerte en contacto por favor inicia sesión</p>
                    <button class="ghost" id="signIn">Iniciar sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>¿Listo para revisar nuestro catálogo?</h1>
                    <p>Ingresa tus detalles personales para poder ser parte de esta comunidad de comercio</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    

    <script src="assets/js/index.js"></script>
    <!-- <script src="assets/js/form.js"></script> -->
    
</body>
</html>