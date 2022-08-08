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

<div class="card card-body">
<form action="save_task.php" method="POST">
<div class ="form.group">
    <input type="text" name="title" class="form-control" placeholder="Cantidad" autofocus>
</div>

<div class ="form.group">
    <input type="text" name="description" class="form-control" placeholder="Descripcion del producto" autofocus>
</div>
<div class ="form.group">
    <input type="text" name="Precio" class="form-control" placeholder="Precio" autofocus>
</div>
<div class ="form.group">
    <input type="text" name="Total" class="form-control" placeholder="Total" autofocus>
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
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = "SELECT * FROM productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_array($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Cantidad']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['Precio']; ?></td>
            <td><?php echo $row['Total'];?></td>
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

        