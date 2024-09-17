<?php
    require "start.php";
    require "head.html";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar</title>
</head>
<body>

    <div class="container-fluid">
        <form  class="mx-auto mt-5 w-25" action="<?php $_PHP_SELF?>" method="post">
            <h1 class="text-center">Solicitações registradas</h1>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="curso">Curso</label>
              </div>
              <select class="custom-select" id="curso" name="curso">
                <option value="DSM">DSM</option>
                <option value="GE">GE</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Mostrar</button>
            <a href="redirect.php"><button type="button" class="btn btn-danger">Voltar</button></a>
        </form>
    </div>

    <div class="container-fluid">

        <div class="mx-auto mt-5 w-50">
            <?php

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if ($_POST['curso'] == "DSM" && file_exists("dsm.txt")) {
                        $handle = fopen("dsm.txt","r");
                    }
                    elseif ($_POST['curso'] == "GE" && file_exists("ge.txt")){
                        $handle = fopen("ge.txt","r");
                    }

                    else{
                            echo "<div class='alert alert-warning' role='alert'>";
                            echo 'Não há nenhuma solicitação registrada';
                            echo '</div>';
                            exit();
                    }

                   
                    echo "<ul class='list-group'>";   
                    while (!feof($handle)) {
                        $line = fgets($handle);

                        if (!empty($line)) {
                            echo " <li class='list-group-item d-flex justify-content-between align-items-center'>".$line."<span class='badge badge-primary badge-pill'>";
                            echo $_POST['curso']."</span>";
                        }
                    }
                    echo "</ul>"; 
                    fclose($handle);
                }
                

            ?>
        </div>
        
    </div>
    
</body>
</html>