<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="estilos/estilo.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        div#corpo{
            width: 270px;
            font-size: 15pt;
        }
        td {
            padding: 6px;
        }
    </style>
</head>
<body>
    <div id="corpo">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            } else {
                echo "Dados foram passados...";
            }
        ?>
    </div>
</body>
</html>