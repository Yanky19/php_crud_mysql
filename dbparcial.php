<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'bdparcial'
);

if (isset($conn)){
    //echo 'DB conectado';
}

?>