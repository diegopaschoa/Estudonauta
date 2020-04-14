<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="estilos/estilo.css"/>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>


    <div id="corpo">
        <?php include_once "topo.php"; ?>

        <h1>Escolha seu jogo</h1>

        <form method="get" id="busca" action="index.php">
            Ordenar: Nome | Produtora | Nota Alta | Nota Baixa |
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>

        <table class="listagem">
            <?php
                $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j JOIN generos g on j.genero = g.cod JOIN produtoras p on j.produtora = p.cod";
                $busca = $banco->query($q);
                if(!$busca){
                    echo "<tr><td>Infelizmente a busca deu errado!";
                }else{
                    if($busca->num_rows == 0){
                        echo "<tr><td>Nenhum registro encontrado!";
                    }else{
                        while($reg=$busca->fetch_object()){
                            $t = thumb($reg->capa);
                            echo "<tr><td><img src='$t' class='mini' />";
                            echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            echo " [$reg->genero] ";
                            echo "<br>$reg->produtora";
                            echo "<td>Adm";
                        }
                    }
                }
            ?>

        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
</html>