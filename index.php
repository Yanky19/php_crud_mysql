<?php include ("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    
    <div class="row">
      
        <div class="col-md-4">
<!-- muestra mensaje si se guardan los datos en la base de datos -->
 <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      

<!-- formulario -->
      <section class="contenedor-sobre-nosotros" id="nosotros">
            <h2 class="titulo"> Informate </h2>
            <div class="contenedor-sobre-nosotros">
             <!-- <img src="" alt="Img/descarga.png"> -->
                <div class="contenido-textos">
                    <h3><span></span>Vacunación COVID-19</h3>   
                    <p>La mejor solución ante el covid, es la vacunación y seguir las medidas de prevención</p> 
                </div>
            </div>
            </section>

<div class="card card-body" id="establecimiento">
<form action="save_task.php" method="POST">
<!-- <div class ="form.group">
    <input type="text" name="Codigo" class="form-control" placeholder="Codigo" autofocus>
</div> -->

<div class ="form.group">
    <input type="text" name="Nombre" class="form-control" placeholder="Nombre" autofocus>
</div>
<div class ="form.group">
    <input type="text" name="Direccion" class="form-control" placeholder="Direccion" autofocus>
</div>
<div class ="form.group">
    <input type="text" name="Municipio" class="form-control" placeholder="Municipio" autofocus>
</div>
<!-- <div class ="form.group">
    <textarea name="description" rows="2" class="form-control" placeholder="Descripcion"></textarea>
</div> -->

<input type="submit" name = "Guardar" class="btn btn-success btn-block" value="Guardar">
</form>
</div>
</div>
</div>

<div class="col-md-8">
<table class="table table-bordered">
        <thead>
          <tr>
           <!-- <th>Codigo</th> -->
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Municipio</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = "SELECT * FROM tbEstablecimiento";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_array($result_tasks)) { ?>
          <tr>
           <!-- <td><?php echo $row['Codigo']; ?></td> -->
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Direccion']; ?></td>
            <td><?php echo $row['Municipio'];?></td>
            <td>
            <a href="edit.php?Id=<?php echo $row['Id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
         
        </tbody>
      </table>
    </div>
  </div>
</main>



       
<?php include("includes/footer.php") ?>

        