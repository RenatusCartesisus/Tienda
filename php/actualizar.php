<?php

include "conexion.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    // $imagen = $_FILES['file'];
    // $img_loc = $imagen['tmp_name'];
    // $img_name = $imagen['name'];

//     if($img_loc){
//      echo "existe";
//     }
//     else{
//     echo "no existe";
//     }


    if($_FILES['file']['tmp_name']){
        $imagen = $_FILES['file'];
   
        $img_loc = $imagen['tmp_name'];
        $img_name = $imagen['name'];
        $destino = "../img/$img_name";
        $sql = "UPDATE `productos` SET `nombre` = '$nombre', `precio` = '$precio', `descripcion` = '$descripcion', `nombre_img` = '$img_name' WHERE `productos`.`id` = $id;";
        move_uploaded_file($img_loc, $destino);
       
    }
    else{
        $sql = "UPDATE `productos` SET `nombre` = '$nombre', `precio` = '$precio', `descripcion` = '$descripcion' WHERE `productos`.`id` = $id;";
        echo "El archivo no existe";
    }

    mysqli_query($conexion, $sql);
    
    header("location: ../crud.php");
    }

?>