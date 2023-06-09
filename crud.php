<?php include "php/conexion.php"; ?>

<head>

  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/d3ae0c1cce.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Actualizar</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
        <form action="php/actualizar.php" enctype="multipart/form-data" method="post" enctype="multipart/form-data">
          <input type="hidden" class="update" name="id">
        <div class="mb-3">
          <label for="" class="form-label">Nombre del producto</label>
          <input type="text"
            class="form-control update" name="nombre" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Precio</label>
          <input type="text"
            class="form-control update" name="precio" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label"></label>
          <textarea class="form-control update" name="descripcion" id="" rows="3" placeholder="Descripción"></textarea>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Imagen actual</label>
          <img src="#" class="update" alt="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Seleccione un nuevo archivo</label>
          <input type="file" class="form-control imagen" name="file" id="file" placeholder="" aria-describedby="fileHelpId">
        </div>
        <input type="submit" class="btn btn-outline-success" name="submit" value="Enviar">
    </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="input-group mb-3 center-block col my-5 d-flex" style="justify-content: space-around;">

<div class="card text-start col-4" style="margin-bottom: 10px;">
  <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> -->
  <div class="card-body">
    <h4 class="card-title">Formulario</h4>
    <form action="php/insertar.php" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Seleccione el archivo</label>
          <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Nombre del producto</label>
          <input type="text"
            class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Precio</label>
          <input type="number"
            class="form-control" name="precio" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label"></label>
          <textarea class="form-control" name="descripcion" id="" rows="3" placeholder="Descripción"></textarea>
        </div>

        <input type="submit" class="btn btn-outline-success" name="submit" value="Enviar">
`
    </form>
  </div>
</div>
<div class="col-7">
  <table class="table table-hover" id="table">
  <thead>
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripción</th>
      <th scope="col">Imagen</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
  </tr>
        </thead>
        <tbody>
        <?php 
        $imagen = mysqli_query($conexion, "SELECT * FROM `productos`");
        while($iterator = mysqli_fetch_array($imagen)){
        ?>
  <tr>
          <td><?php echo $iterator['id']; ?></td>
          <td><?php echo $iterator['nombre']; ?></td>
          <td>$<?php echo $iterator['precio']; ?></td>
          <td><?php echo $iterator['descripcion']; ?></td>
          <td><img src="img/<?php echo $iterator['nombre_img'];  ?>" width="70px"  alt="<?php echo $iterator['nombre_img'];  ?>"></td>
          <td><button class="btn btn-primary editar" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fa-sharp fa-solid fa-pen"></button></td>
          <td><button name="" id="" onclick="return ventana(<?php echo $iterator['id']; ?>);" class="btn btn-danger" href="#" role="button"><i class="fa-sharp fa-solid fa-trash"></button></td>
        </tr>
        <?php } ?>
        </tbody>
  </table>
</div>
    <div class="container">
  <button type="button" class="btn btn-primary">Regresar</button>
    </div>
</div>

<script>
  function ventana(id){
  swal({
  title: "¿En serio?",
  text: "¡Una vez eliminado, no podrás recuperar el archivo!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href = "php/borrar.php?id="+id;
    swal("¡Se ha eliminado exitosamente!", {
      icon: "success",
    });
  } else {
    swal("¡Tu archivo está a salvo!");
    }
  });
return false;
}
</script>
 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    var modalId = document.getElementById('modalId');
  
    modalId.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');
  
      // Use above variables to manipulate the DOM
    });
  </script>

   <script src="assets/js/modal.js"></script>

</body>

</html>