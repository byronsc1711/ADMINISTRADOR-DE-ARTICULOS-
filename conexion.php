<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "x_corapecurso_cms";

$conn = mysqli_connect($servername, $username, $password,$database);

if ($conn->connect_error) {

    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);

  }

?>