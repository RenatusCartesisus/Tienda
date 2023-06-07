<?php

include "conexion.php";

$id = $_GET['id'];

$nombre = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM productos WHERE id=$id;"));

$nombre = $nombre['nombre_img'];

if(unlink("../img/$nombre")){
    
    mysqli_query($conexion, "DELETE FROM productos WHERE `productos`.`id` = ".$id);
    header("location: ../crud.php");
    
}
else if(file_exists("../img/$nombre")){
    echo "No se ha borrado la imagen";
}



// if(!unlink()){

// }



?>