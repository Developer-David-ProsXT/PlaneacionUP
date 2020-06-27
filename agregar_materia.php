<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
        <title>Add new unit</title>
    </head>
    <body>
    <h1>Add new unit</h1><br>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter the subject name</label>
                        <input type="text" class="form-control" name="name_subject" id="name_subject" aria-describedby="emailHelp" placeholder="Example: Algorithms">
                    </div>
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
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="btn_buscar" value="Insert">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['btn_buscar'])){
        $name_subject = $_POST['name_subject'];
        $category_profe = $_POST['category_profe'];
        $category_periodo = $_POST['category_periodo'];


        $nuevo_name_subject = Convertidor_Cadena($name_subject);

        $command = "start C:\\Users\\progr\\source\\repos\\CPlaneacion\\CPlaneacion\\bin\\Debug\\CPlaneacion.exe 2 ".$nuevo_name_subject." ".$category_profe." ".$category_periodo;
        exec($command);
    }

    function Convertidor_Cadena ($palabra){
        $array = preg_split("/[\s]+/", $palabra);
        $nueva_palabra = "";
        for($i = 0; $i < sizeof($array); $i++){
            if($i == 0){
                $nueva_palabra = $array[$i];
            } else {
                $nueva_palabra = $nueva_palabra."_".$array[$i];
            }
        }
        return $nueva_palabra;
    }
?>