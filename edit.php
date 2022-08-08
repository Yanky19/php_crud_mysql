<?php
include("db.php");
$title = '';
$description= '';
$Precio= '';
$Total= '';

if  (isset($_GET['Id'])) {
  $Id = $_GET['Id'];
  $query = "SELECT * FROM productos WHERE Id=$Id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['Cantidad'];
    $description = $row['Descripcion'];
    $Precio = $row['Precio'];
    $Total = $row['Total'];
  }
}

if (isset($_POST['update'])) {
  $Id = $_GET['Id'];
  $title= $_POST['Cantidad'];
  $description = $_POST['Descripcion'];
  $Precio = $_POST['Precio'];
  $Total = $_POST['Total'];

  $query = "UPDATE productos set Cantidad = '$title', descripcion = '$description', Precio='$Precio', Total='$Total' WHERE Id=$Id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?Id=<?php echo $_GET['Id']; ?>" method="POST">
        <div class="form-group">
          <input name="Cantidad" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Actualizar cantidad">
        </div>
        <!-- <div class="form-group"> -->
        <!-- <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea> -->
       <!-- </div> -->
        <div class="form-group">
          <input name="Descripcion" type="text" class="form-control" value="<?php echo $description; ?>" placeholder="Actualizar Descripcion">
        </div>
        <div class="form-group">
          <input name="Precio" type="text" class="form-control" value="<?php echo $Precio; ?>" placeholder="Actualizar Precio">
        </div>
        <div class="form-group">
          <input name="Total" type="text" class="form-control" value="<?php echo $Total; ?>" placeholder="Actualizar Total">
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>