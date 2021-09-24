<?php
require("./funcoes.php");
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styleLogin.css">

    <title>Login</title>
</head>

<body>
    <div class="container-geral">
        <div class="container-form">
            <form action="processa_login.php" method="POST">
                <div class="form-group">
                    <label for="txt_usuario">USUÁRIO</label>
                    <input type="text" class="form-control" name="txt_usuario" id="txt_usuario">
                </div>

                <div class="form-group">
                    <label for="txt_senha">SENHA</label>
                    <input type="password" class="form-control" name="txt_senha" id="txt_senha">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">LOGAR</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>