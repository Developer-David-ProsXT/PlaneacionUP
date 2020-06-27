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
                        <label for="exampleInputEmail1">Enter the name of the unit</label>
                        <input type="text" class="form-control" name="name_unit" id="name_unit" aria-describedby="emailHelp" placeholder="Example: Unit 1. Introduction to programming">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter the start date of the unit</label>
                        <input type="date" class="form-control" name="date_start" id="date_start" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter the end date of the unit</label>
                        <input type="date" class="form-control" name="date_end" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter the topics of the unit</label>
                        <textarea class="form-control" name="topics" id="exampleFormControlTextarea1" rows="3" placeholder="Example: I. User interface. File management - Define the concepts of interface and file."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter unit learning</label>
                        <textarea class="form-control" name="learning" id="exampleFormControlTextarea1" rows="3" placeholder="Demonstration practice - Laboratory practice"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter educational resources</label>
                        <textarea class="form-control" name="resources" id="exampleFormControlTextarea1" rows="3" placeholder="Calculation equipment - Antivirus and threat detection software - Projector - Pintarrón - Internet"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter References Material</label>
                        <textarea class="form-control" name="references" id="exampleFormControlTextarea1" rows="3" placeholder="Auxiliary operations with Information and Communication Technologies Cabello García J.M. Ed IC Editorial - Computer Basics Absolute Beginners Guide: Windows 10 Edition Miller M. Ed. Que Pub - Restrepo J. A. Computers for all Ed. Vintage Spanish"></textarea>
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
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="btn_buscar" value="Insert">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['btn_buscar'])){
        $name_unit = $_POST['name_unit'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $topics = $_POST['topics'];
        $learning = $_POST['learning'];
        $resources = $_POST['resources'];
        $references = $_POST['references'];
        $category_materia = $_POST['category_materia'];


        $nuevo_name_unit = Convertidor_Cadena($name_unit);
        $nuevo_topics = Convertidor_Cadena($topics);
        $nuevo_learning = Convertidor_Cadena($learning);
        $nuevo_resources = Convertidor_Cadena($resources);
        $nuevo_references = Convertidor_Cadena($references);

        $command = "start C:\\Users\\progr\\source\\repos\\CPlaneacion\\CPlaneacion\\bin\\Debug\\CPlaneacion.exe 1 ".$nuevo_name_unit." ".$date_start." ".$date_end." ".$nuevo_topics." ".$nuevo_learning." ".$nuevo_resources." ".$nuevo_references." ".$category_materia;
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