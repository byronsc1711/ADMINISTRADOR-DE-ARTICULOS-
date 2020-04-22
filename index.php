<?php include("include/header.php")?>
<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../empresa/css/dos.css"rel="stylesheet" type="text/css">
    <script src="../empresa/js/jquery-3.5.0.min.js"></script>
    <title>Administracion de Articulos</title>
    

    <style>
        #select{
            width: 100%;
        }
    </style>

<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>

</head>

<body>
   
    <br>
    <center><h1 class=" text-4xl"><u>ADMINISTRACIÓN DE ARTÍCULOS</u></h1></center>
    <br><br>


    <div id="actions" class="px-5">

    <center>
    <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar un articulo">
    <br>
    <br>
    <a href="guardar.php?id=<?php echo $row['Id']?>" class="btn btn-success">NUEVO</a>
    </center>

    <br>
    <fieldset class="my-3 bg-indigo-200 text-teal-900 h-full w-full px-6">
        <div class="col-md-12">

        <section id="tabla_resultado">
        <table class="table table-bordered order-table">
            <thead> 
                <tr >
                    <th width="780">LISTA DE ARTÍCULOS</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>

            <tbody>

            <?php 
            $query= "SELECT *FROM articulos";
            $resultado= mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
                <td> <?php echo $row['Articulos'] ?> </td>

                <td>
                    <a href="editar.php?id=<?php echo $row['Id']?>" class="btn btn-primary">
                    Editar
                </a>
                    
                    <a href="eliminar.php?id=<?php echo $row['Id']?>" class="btn btn-danger">
                    Eliminar
                </a>
                   
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </section>
        </div>
    </fieldset>

</div>

</body>

</html>
    