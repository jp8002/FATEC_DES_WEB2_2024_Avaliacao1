<?php
    require "start.php";
    require "head.html";

    if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['laboratorio'] != "" && $_POST['prazo'] != "" && $_POST['solicitacao'] != ""  && $_POST['curso'] != ""){

        if ($_POST['curso'] == "DSM") {
            $handle = fopen("dsm.txt","a");
        }
        elseif ($_POST['curso'] == "GE"){
            $handle = fopen("ge.txt","a");
        }


        fwrite($handle, $_POST['laboratorio']." | ".$_POST['prazo']." | ".$_POST['solicitacao'].PHP_EOL);
        $_POST = array();
        
        fclose($handle);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>
</head>
<body>
    
    <form  class="mx-auto mt-5 w-25" action="<?php $_PHP_SELF?>" method="post">
        <h1 >Área de Registro</h1>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="laboratorio">laboratórios</label>
          </div>
          <select class="custom-select" id="laboratorio" name="laboratorio">
            <option value="Laboratório 1">Laboratório 1</option>
            <option value="Laboratório 2">Laboratório 2</option>
            <option value="Laboratório 3">Laboratório 3</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="prazo">Prazo Limite</label>
          </div>
          <input type="date" name="prazo">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="solicitacao">Solicitação</label>
          </div>
          <textarea rows="3" cols="80" name="solicitacao"></textarea>
        </div>

        <div class="input-group-prepend">
            <label class="input-group-text" for="curso">Curso atendido</label>
          </div>
          <select class="custom-select" id="curso" name="curso">
            <option value="DSM">DSM</option>
            <option value="GE">GE</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="dash_coor.php"><button type="button" class="btn btn-danger">Voltar</button></a>

    </form>
    
</body>
</html>