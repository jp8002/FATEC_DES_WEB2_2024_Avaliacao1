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

    <form  class="mx-auto mt-5 w-25" action="<?php $_PHP_SELF?>" method="post">
        <h1 >Registros cadastrados</h1>

        <div class="input-group-prepend">
            <label class="input-group-text" for="curso">Curso</label>
          </div>
          <select class="custom-select" id="curso" name="curso">
            <option value="DSM">DSM</option>
            <option value="GE">GE</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Mostrar</button>
        <a href="dash_coor.php"><button type="button" class="btn btn-danger">Voltar</button></a>

    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['curso'] == "DSM") {
                $handle = fopen("dsm.txt","r");
            }
            elseif ($_POST['curso'] == "GE"){
                $handle = fopen("ge.txt","r");
            }

           
            while (!feof($handle)) {
                echo fgets($handle)."<br>";
            }
            fclose($handle);
        }


    ?>
</body>
</html>