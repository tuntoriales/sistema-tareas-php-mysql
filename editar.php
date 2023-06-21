<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <?php
        $id_tarea = $_GET['id'];

        include "includes/config.php";

        $sql = $conn->query("SELECT * FROM tareas WHERE id = '$id_tarea'");
        $row = $sql->fetch_assoc();
    ?>
    
    <div class="container">
        <div class="row">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Tarea</label>
                    <textarea class="form-control" name="tarea" id="exampleFormControlTextarea1" rows="3"><?= $row['tarea']; ?></textarea>
                </div>

                <button type="submit" name="editar" class="btn btn-success">Editar tarea</button>
            </form>
        </div>

        <?php

        if(isset($_POST['editar'])){
            
            $tarea = $_POST['tarea'];

            if(!empty($tarea)){
                
                require "includes/config.php";

                $query = $conn->query("UPDATE tareas SET tarea = '$tarea' WHERE id = '$id_tarea'");

                if($query){ 
                    header("Location: index.php");
                }

            }else{
            ?>

            <div class="alert alert-danger mt-3" role="alert">
            Error: El campo no contiene tareas!
            </div>


            <?php
            }

        }

        ?>
    </div>


</body>
</html>