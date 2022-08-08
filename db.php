<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud_mysql'
);

if (isset($conn)){
    //echo 'DB conectado';
}

?>