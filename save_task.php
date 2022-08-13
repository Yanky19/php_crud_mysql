<?php
include("bdparcial.php");

if (isset($_POST['Guardar'])){
   // $Codigo = $_POST['Codigo'];
    $Nombre = $_POST['Nombre'];
    $Direccion = $_POST['Direccion'];
    $Municipio = $_POST['Municipio'];
    //echo $title; 
    //echo $description;

    $query = "INSERT INTO tbEstablecimientos (Nombre, Direccion, Municipio) VALUES ('$Nombre','$Direccion','$Municipio')";
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