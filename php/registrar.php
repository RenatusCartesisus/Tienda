<?php
include "conexion.php";

session_start();

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$falso = false;

if(empty($usuario)){
    $_SESSION['usuario_fallo']="El usuario no es valido";
$falso = true;
}else{
    $_SESSION['usuario_fallo']="";
}
if(empty($nombre)){
    $_SESSION['nombre_fallo']="El nombre no es valido";
    $falso = true;
}else{
    $_SESSION['nombre_fallo']="";
}
if(empty($correo)||(!filter_var($correo, FILTER_VALIDATE_EMAIL))){
    $_SESSION['correo_fallo']="El correo no es valido";
    $falso = true;
}
else{
    $_SESSION['correo_fallo']="";
}
if(empty($pass)){
    $_SESSION['pass_fallo']="La contraseña no es válida";
    $falso = true;
}else{
    $_SESSION['pass_fallo']="";
}
if($falso){
    header('location: ../loginInterface.php'); 
    die(); 
}

session_destroy();

$sql = "INSERT INTO `usuarios` (`id`, `correo`, `nombre`, `usuario`, `pass`) VALUES (NULL, '$correo', '$nombre', '$usuario', '$pass');";

//Verificar que el correo no se repita en la base de datos

$verificarCorreo = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `correo`='$correo'");

if(mysqli_num_rows($verificarCorreo)>0){
    echo 
    // "<script>
    //  alert('Ese correo ya existe wey.');
    //  window.location.href='../loginInterface.php';
    //  </script>";
    "<script>
    alert('Ese correo ya existe wey.');
    window.location.href='../loginInterface.php';
    </script>";
    exit();//Termina el script actual
}

$verificarUsuario = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `usuario`='$usuario'");

if(mysqli_num_rows($verificarUsuario)>0){
    echo "
    <script>
    alert('Ese wey ya existe.');
    window.location.href='../loginInterface.php';
    </script>";
    exit();//Termina el script actual
}

$query = mysqli_query($conexion ,$sql);

if($query){
   header("location: ../loginInterface.php");
}
else{
    echo "
    <script>
    alert('Inutil');
    </script>";
}

mysqli_close($conexion);


?>