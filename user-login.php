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
            font-size: 13pt;
        }
        td {
            padding: 6px;
        }
    </style>
</head>
<body>
        <?php
            require_once "includes/banco.php";
            require_once "includes/login.php";
            require_once "includes/funcoes.php";
        ?>


    <div id="corpo">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            } else {
                $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                $busca = $banco->query($q);
                if(!$busca){
                    echo msg_erro('Falha ao acessar o banco!');
                } else {
                    if($busca->num_rows > 0){
                        $reg = $busca->fetch_object();
                        if(testarhash($s, $reg->senha)){
                            echo msg_sucesso('Logado com sucesso');
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        }else{
                            echo msg_erro('Senha inválida');
                        }
                    }else{
                        echo msg_erro('Usuário não existe');
                    }
                    
                }
            }
            echo voltar();
        ?>
    </div>
</body>
</html>