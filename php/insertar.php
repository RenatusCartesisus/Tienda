<?php

include "conexion.php";

if(!empty($_POST['nombre'])&&!empty($_POST['precio'])&&!empty($_POST['descripcion'])&&!empty($_FILES['file'])){
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$imagen = $_FILES['file'];
$img_loc = $imagen['tmp_name'];
$img_name = $imagen['name'];
// print_r($_FILES['file']['name']);
$destino = "../img/$img_name";
 move_uploaded_file($img_loc, $destino);
//  insertar los datos en la BD
mysqli_query($conexion, "INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `nombre_img`) VALUES (NULL, '$nombre', '$precio', '$descripcion', '$img_name');");

header("location: ../crud.php");
}
?>

