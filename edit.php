<?php
include("bdparcial.php");
$Codigo = '';
$Nombre= '';
$Descripcion= '';
$Municipio= '';

if  (isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "SELECT * FROM tbEstablecimiento WHERE Codigo=$Codigo";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Codigo = $row['Codigo'];
    $Nombre = $row['Nombre'];
    $Descripcion = $row['Descripcion'];
    $Municipio = $row['Municipio'];
  }
}

if (isset($_POST['update'])) {
  $Codigo = $_GET['Codigo'];
  $Nombre= $_POST['Nombre'];
  $descripcion = $_POST['Descripcion'];
  $Municipio = $_POST['Municipio'];
 

  $query = "UPDATE tbEstablecimiento set Codigo = '$Codigo', Nombre = '$Nombre', Descripcion='$Descripcion', Municipio='$Municipio' WHERE Codigo=$Codigo";
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
          <input name="Codigo" type="text" class="form-control" value="<?php echo $Codigo; ?>" placeholder="Actualizar cantidad">
        </div>
        <!-- <div class="form-group"> -->
        <!-- <textarea name="Nombre" class="form-control" cols="30" rows="10"><?php echo $Nombre;?></textarea> -->
       <!-- </div> -->
        <div class="form-group">
          <input name="Descripcion" type="text" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Actualizar Descripcion">
        </div>
        <div class="form-group">
          <input name="Municipio" type="text" class="form-control" value="<?php echo $Municipio; ?>" placeholder="Actualizar Precio">
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