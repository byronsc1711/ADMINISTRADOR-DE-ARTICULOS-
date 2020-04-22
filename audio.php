<?php include("include/header.php")?>
<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../articulos/css/dos.css"rel="stylesheet" type="text/css">
    <title>Administracion de Articulos</title>
    <style>
        #select{
            width: 100%;
        }
    </style>
</head>

<body>
   
    <br>
    <center><h1 class=" text-4xl"><u>ADMINISTRACIÓN DE AUDIOS</u></h1></center>
    <br>

    <div id="actions" class="px-5">

    <fieldset class="my-3 bg-indigo-200 text-teal-900 h-full w-full px-6">
        <div class="col-md-12">

        <section id="tabla_resultado">
        
        <center>
        <table>
            <thead> 
                <tr >
                    
                </tr>
            </thead>

            <tbody>

            <?php 
            $query= "SELECT *FROM articulos";
            $resultado= mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
                <td> <?php echo $row['Articulos'] ?> </td>
                <td> <?php echo $row['Detalle'] ?> </td>
                <td> <?php echo $row['media'] ?> </td>
                

                <td>
                   
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </center>
        </section>
        </div>
    </fieldset>

</div>

</body>

</html>
    