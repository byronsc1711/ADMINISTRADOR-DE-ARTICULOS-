<?php include("include/header.php")?>

<?php
include("conexion.php");

if(isset($_POST['guardar'])){
    $id = $_GET['id'];
    $nombre= $_POST['Nombre'];
    $detalle= $_POST['detalle'];
    $radiop= $_POST['publicado'];
    $radios= $_POST['media'];
    $url = $_POST['AUD'];

    $query = "INSERT INTO articulos(Articulos,Detalle,publicado,archivos,media) VALUES ('$nombre','$detalle','$radiop','$radios','$url')";
    $resultado=mysqli_query($conn,$query);

    header("Location: index.php");
}
?>

<?php
    require('conexion.php');
    session_start();
    if (isset($_SESSION['articulo'])) {
    $query= mysqli_query($conn,"SELECT * from articulos where Aticulos='$_SESSION[articulo]';");
    $partes=mysqli_fetch_array($query);
    $llenar=true;
    }else{
       $llenar=false;
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../empresa/css/uno.css"rel="stylesheet" type="text/css">
    <title>Agregar nuevos articulos</title>
    <script src="../empresa/js/funcion.js"></script>
</head>
<body>


<fieldset class="my-3 bg-indigo-200 text-teal-900 h-full w-full px-6">
        <br>
        <div class="col-md-12">
        <div class="row">
        
        <div id="Cabecera">
            <form action="guardar.php?id=<?php echo $_GET['Id']; ?>" method="POST">


        <table>
            <thead> 
                <tr >
                    <td width="400">
                        <h1>&nbsp &nbsp CONTENIDO</h1>
                        
                    </td>

                    <td width="150">
                            <button class="btn btn-success" name="guardar">Guardar</button>   
                    </td>

                    <td>
                    <a href="index.php"> <input type="button" name="" value="Cancelar" class="btn btn-danger"> </a>
                    </td>
                </tr>
                </thead>
                </table>
                <br><br>

                <table>
                    <thead>
                <tr>
                    <td width="400">
                    &nbsp &nbsp NOMBRE *<input type="text" name="Nombre" id="Nombre" class="border-2 rounded-sm" placeholder="Ingrese un nombre" maxlength="75" required>  
                    </td>

                    <td>
                    <input type="radio" name="publicado" value="1" required id="p"> Publicado
                    <br> 
                    <input type="radio" name="publicado" value="0" id="no" checked disabled="trues"> No Publicado
                    </td>
                </tr>
                </thead>
                </table>
            <br>

        <hr>
        <br>
        &nbsp &nbsp DETALLE
        <br>
        <br>

        <table>
            <thead>
                <tr >
                    <td width="500">
                        <textarea name="detalle" id="" cols="40" rows="6" class="mx-3" style="overflow: scroll;
                        resize: none;" placeholder="Ingrese el detalle" maxlength="300" required pattern="[A-Za-z0-9]+">
                        </textarea>
                    </td>

                    <td width="300">
                    <input type="radio" name="media" required onchange="mediaselect();" id="V" value="V"> Video   
                    <br> 
                    <input type="radio" name="media" required onchange="mediaselect();" id="A" value="A"> Audio
                    <br>
                    <input type="radio" name="media" required onchange="mediaselect();" id="I" value="I" checked> Imagen
                    <br> 
                    <input type="radio" name="media" required onchange="mediaselect();" id="I&A" value="I&A"> Imagen y Audio
                    </td>

                    <td>
                        URL Video: <input class="border-2 rounded-sm" name="VID" type="text" disabled id="MediaVideo" v>
                        <br>
                        <br>
                        URL Audio <form action="" method="POST" enctype="multipart/form-data"><input class="border-2 rounded-sm" name="AUD" type="file" required disabled id="MediaAudio"> </form>
                        <br>
                        <br>
                        URL Imagen <input class="border-2 rounded-sm" name="IMG" type="text" disabled id="MediaImagen">
                    </td>
                </tr>

            </thead>
        </table>
        
        </form>
        </div>
        </div>
    </fieldset>

    
</body>
</html>

<?php

if ($llenar) {
    if ($partes['Publicado']==true) {
        echo '<script>document.getElementById("p").checked=true;</script>';
     }else{
        echo '<script>document.getElementById("p").checked=true;</script>';
     }
     echo '<script>document.getElementById("Nombre").value="'.$partes['Nombre_Articulo'].'";
     
     </script>"';
     
     if (isset($partes['AudioURL']) && isset($partes['ImageURL'])) {
        echo '<script>document.getElementById("I&A").checked=true;
        document.getElementById("MediaImagen").disabled=false;
        document.getElementById("MediaAudio").disabled=false;
        document.getElementById("MediaImagen").value="'.$partes['ImageURL'].'";
        document.getElementById("MediaAudio").value="'.$partes['AudioURL'].'";
        </script>';   
     }elseif (isset($partes['AudioURL']) ) {
         echo '<script>document.getElementById("A").checked=true;
         document.getElementById("MediaAudio").disabled=false;
         document.getElementById("MediaAudio").value="'.$partes['AudioURL'].'";
         </script>';
     }elseif (isset($partes['ImageURL'])) {
         echo '<script>document.getElementById("I").checked=true;
         document.getElementById("MediaImagen").disabled=false;
         document.getElementById("MediaImagen").value="'.$partes['ImageURL'].'";
         </script>';
     }elseif (isset($partes['VideoURL'])) {
         echo '<script>document.getElementById("V").checked=true;
         document.getElementById("MediaVideo").disabled=false;
         document.getElementById("MediaVideo").value="'.$partes['VideoURL'].'";
         </script>';
     }     
}
?>