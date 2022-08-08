<?php
include("db.php");

if (isset($_POST['Guardar'])){
    //Cantidad
    $title = $_POST['title'];
    //descripcion
    $description = $_POST['description'];
    $Precio = $_POST['Precio'];
    $Total = $_POST['Total'];
    //echo $title; 
    //echo $description;

    $query = "INSERT INTO productos (Cantidad, Descripcion, Precio, Total) VALUES ('$title', '$description','$Precio','$Total')";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("Error");
    }    
       //echo 'Guardado';
       
       $_SESSION['message']= "Datos guardados satisfactoriamente";
       $_SESSION['message_type']= 'success';
       
       header("Location: index.php");
    }

?>