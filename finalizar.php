<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/pedido.css" rel="stylesheet">
    <title>EPI's</title>
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

    <div class="pedido">
        <h1> RESUMO DO PEDIDO </h1>
        <div class="resumo">
            <div class="tabela">
                <h2>ITEM</h2>
                <h2>QTD</h2>
            </div>
            <hr class="linha1">
        <div class="linha2"></div>

    <?php
        //include ('conexao.php');

        session_start();

        foreach($_SESSION['dados'] as $produtos){
            $conexao = new PDO('mysql:host=localhost;dbname=gm_novo',"root","");
            $insert = $conexao->prepare("INSERT INTO pedido() VALUES (NULL,?,?,now())");
            $insert->bindParam(1, $produtos['produto']);
            $insert->bindParam(2, $produtos['quantidade']);
            $insert->execute();

            echo "<div class='itens'>
                    <p>".$produtos['produto']."</p>
                    <p>".$produtos['quantidade']."</p>                                                                              
                </div>
            <hr>";
        }
    ?>

    </div>
    
    <script src="script.js"></script>
</body>
</html>