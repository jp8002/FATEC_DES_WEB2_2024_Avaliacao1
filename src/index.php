<?php
    session_start();

    if (isset($_SESSION["auth"]) && $_SESSION['auth'] == TRUE && $_SESSION['user'] == "coordenacao") {
        header("location:dash_coor.php");
    }

    elseif (isset($_SESSION["auth"]) && $_SESSION['auth'] == TRUE && $_SESSION['user'] == "tecnico")  {
            $_SESSION["user"] = "tecnico";
            header("location:dash_tec.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION["auth"]) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
        $_SESSION["auth"] = TRUE;

        if ($_POST["usuario"] == "adm" && $_POST["senha"] == "1234")  {
            $_SESSION["user"] = "coordenacao";
            header("location:dash_coor.php");
        }

        elseif ($_POST["usuario"] == "casse" && $_POST["senha"] == "senha")  {
            $_SESSION["user"] = "tecnico";
            header("location:dash_tec.php");
        }

        else{
            session_destroy();
            echo "<div class='alert alert-danger' role='alert'>";
            echo 'Usuário e/ou senha inválidos. Tente novamente.';
            echo '</div>';
            
        }
    }

    require "head.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<div class="container-fluid">
    <form class="mx-auto mt-5 w-25 border border-dark rounded p-3" action="<?php $_PHP_SELF?>" method="post">
        <h1 class="text-center">LOGIN</h1>
        <div class="form-group ">
            <label for="exampleInputEmail1">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Seu nome de usuário">
        </div>

        <div class="form-group">
            <label for="Senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
        </div>

        <div class="form-group">
            <small>Quero <a href="todo.php">visualizar todas as solicitações</a>.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

    
</body>
</html>