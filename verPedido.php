<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/historico.css" rel="stylesheet">
    <title>PEDIDO</title>
</head>
<body>

    <header id="header">
        <a id="logo"href="inicio.php"><img src="img/logo-GM.png" alt=""></a>
        <nav id="nav">
            <ul id="menu">
                <li><a href="historico.php">HISTÓRICO</a></li>
                <li><a href="logout.php">SAIR <-</a></li>
            </ul>
        <img id="btn-mobile" src="img/setting1.png" alt="">
        </nav>

    </header>

    <!-- POP-UP -->

    <div class="popup" id="popup">
        <div class="resumo-popup">
            <div class="tabela">
                <h2>ITEM</h2>
                <h2>QTD</h2>
            </div>
            <hr class="linha1">

        <?php
            include("conexao.php");
            
            $passedId = $_GET['id'];

            $sql = "SELECT PR.nome, PP.quantidade FROM pedido_produto PP
            JOIN pedido P ON P.id = PP.pedido_id
            JOIN produto PR ON PR.id = PP.produto_id
            WHERE P.id = '{$passedId}'";
            
            $qr = mysqli_query($conexao, $sql);
                        
            while ($ln = mysqli_fetch_assoc($qr)){
                echo'<li class="lista">
                            <p>'.$ln['nome'].'</p>
                            <p>'.$ln['quantidade'].'</p>
                    </li>
                    <hr>';
            }
            echo '<span class="lista-numero"> pedido nº '.$passedId.'</span>';
        ?>
        </div>
    </div>
    <div class="voltar-btn">
        <a href="historico.php" >Voltar</a>
    </div>
    <script src="script.js"></script>
</body>
</html>