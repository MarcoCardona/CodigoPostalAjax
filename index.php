<?php
$conexion = mysqli_connect("localhost", "root", "", "sistem40_ulinea");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <script>
        $(document).ready(function () {
            $("#cp").blur(function () {
                var cp = $("#cp").val();
                $.ajax({
                    url: 'busqueda.php',
                    data: {cp: cp},
                    type: 'POST',
                    success: function (response) {
                        var datos = JSON.parse(response);
                        $("#municipio").val(datos[0]['municipio']);
                        $("#municipio").prop('disabled', true);
                        $("#estado").val(datos[0]['estado']);
                        $("#estado").prop('disabled', true);

                        $("#asentamiento").val(datos[0]['asentamiento']);
                        var i=0;
                        for(i=0;i<datos.length;i++){
                            $("#colonia").append("<option value=" + datos[i]['asentamiento'] + ">" + datos[i]['asentamiento'] + "</option>");
                        }
                    },
                    error: function (response) {
                        alert('Disculpe, existió un problema');
                    }/*,
                     complete: function (response) {
                     alert('Petición realizada');
                     }*/
                });
            });
        });

    </script>
    <body>

        <div class="container">

            <form>
                <div class="form-group">
                    <label for="usr">Codigo postal</label>
                    <input type="text" class="form-control" id="cp" >
                </div>
                <div class="form-group">
                    <label for="usr">Estado</label>
                    <input type="text" class="form-control" id="estado" disabled="true">
                </div>
                <div class="form-group">
                    <label for="usr">Municipio</label>
                    <input type="text" class="form-control" id="municipio" disabled="true">
                </div>
                <div class="form-group">
                    <label for="usr">Colonia</label>
                    <select  class="form-control" id="colonia">
                        <option>
                            ------
                        </option>
                    </select>
                </div>

            </form>
        </div>

    </body>
</html>
