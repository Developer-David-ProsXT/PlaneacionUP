<?php
    include 'config.php';

    $category_profe = $_POST['category_profe'];
    $category_periodo = $_POST['category_periodo'];
    $category_materia = $_POST['category_materia'];
?>

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
        <h1>Planning catalog</h1>
        <br>
        <button type="button" class="btn btn-primary" onclick="window.location.href='agregar_unidad.php'">Agregar Nueva Unidad con C#</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='agregar_materia.php'">Agregar Nueva Materia con C#</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='asignar_horario.php'">Asignacion Horario Clase</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='carga_masiva.php'">Carga Masiva C#</button>

        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre del Maestro</th>
                    <th scope="col">Periodo Escolar</th>
                    <th scope="col">Nombre de la Materia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from Profesores where id=".$category_profe.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $dato['nombre'];
                    ?></td>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from CicloEscolar where id=".$category_periodo.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $dato['nombre'];
                    ?></td>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from Materias where id=".$category_materia.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $dato['nombre'];
                    ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Unidad</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Topics</th>
                    <th scope="col">Learning / Teaching Strategies</th>
                    <th scope="col">Educational Resources</th>
                    <th scope="col">References Material</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($mysql, "select c.nombre, m.id, m.nombre, u.nombre, u.fecha_inicio, u.fecha_final, u.topics, u. learning, u.resources, u.material, p.nombre
                                            from Materias as m inner join Unidades as u on m.id = u.id_materia inner join Profesores as p on m.id_profe = p.id
                                            inner join CicloEscolar as c on m.id_ciclo = c.id where m.id =".$category_materia." && m.id_profe = ".$category_profe." && m.id_ciclo = ".$category_periodo.";");
                    while ($datos = mysqli_fetch_array($query)) 
                    {
                ?>
                    <tr>
                        <td><?php echo $datos['nombre']?></td>
                        <td><?php echo $datos['fecha_inicio']?></td>
                        <td><?php echo $datos['fecha_final']?></td>
                        <td><?php echo $datos['topics']?></td>
                        <td><?php echo $datos['learning']?></td>
                        <td><?php echo $datos['resources']?></td>
                        <td><?php echo $datos['material']?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>    
    </body>
</html>