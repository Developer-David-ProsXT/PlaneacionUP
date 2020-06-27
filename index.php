<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
        <title>Planning catalog</title>
    </head>
    <body>
        <h1>Planning catalog</h1><br>
        <div class="card">
            <div class="card-body">
                <form action="create_planeacion.php" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select the teacher's name</label>
                        <select class="form-control" name="category_profe">
                            <?php
                                include 'config.php';
                                $query = mysqli_query($mysql, "select id, nombre from Profesores;");

                                while($datos = mysqli_fetch_array($query))
                                {
                            ?>
                                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select the school period</label>
                        <select class="form-control" name="category_periodo">
                            <?php
                                include 'config.php';
                                $query = mysqli_query($mysql, "select id, nombre from CicloEscolar;");

                                while($datos = mysqli_fetch_array($query))
                                {
                            ?>
                                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select the subject name</label>
                        <select class="form-control" name="category_materia">
                            <?php
                                include 'config.php';
                                $query = mysqli_query($mysql, "select id, nombre from Materias;");

                                while($datos = mysqli_fetch_array($query))
                                {
                            ?>
                                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="btn_buscar" value="Next">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>