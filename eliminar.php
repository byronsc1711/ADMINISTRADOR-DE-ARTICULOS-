<?php
include("conexion.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM articulos WHERE id=$id";
  $result = mysqli_query($conn,$query);

  if(!$result){
    die("Query Failed");

  }
  
  $_SESSION['message'] = 'Articulo eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header("Location:index.php");
}

?>
