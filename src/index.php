<?php
    session_start();
    if (isset($_SESSION["auth"]) && $_SESSION['auth'] == TRUE && $_SESSION['user'] == "cordenacao") {
        header("location:dash_coor.php");
    }

    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION["auth"])) {
        $_SESSION["auth"] = TRUE;

        if ($_POST["login"] == "adm" && $_POST["senha"] == "1234")  {
            $_SESSION["user"] = "cordenacao";
            header("location:dash_coor.php");
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
    <form class="mx-auto mt-5 w-25" action="<?php $_PHP_SELF?>" method="post">
        <div class="form-group ">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Seu login">
        </div>

        <div class="form-group">
            <label for="Senha">Senha</label>
            <input type="password" class="form-control" id="Senha" name="senha" placeholder="Senha">
        </div>

        <div class="form-group">
            <small>Quero entrar como <a href="">convidado</a>.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

    
</body>
</html>