<?php

include("bdparcial.php");

if(isset($_GET['Id'])) {
  $Id = $_GET['Id'];
  $query = "DELETE FROM tbEstablecimiento WHERE Codigo = $Codigo";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>