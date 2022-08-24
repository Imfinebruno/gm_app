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
    <title>HISTÓRICO</title>
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

    <div class="pedido" id="pedido">
        <h1> HISTÓRICO </h1>
        <div class="resumo">
            <div class="tabela">
                <h2>ID PEDIDO</h2>
                <h2>DATA</h2>
            </div>
            <hr class="linha1">

        <?php
            include("conexao.php");

            $sql = "SELECT P.id, P.data_hora FROM pedido_produto PP JOIN pedido P ON P.id = PP.pedido_id GROUP BY P.id ORDER BY P.id DESC";
            $qr = mysqli_query($conexao, $sql); 

            while ($ln = mysqli_fetch_assoc ($qr) ){
                echo'<li class="lista">
                        <p> Pedido: '.$ln['id'].' | <a href="javascript:abrirPopup()">Visualizar</a></p>
                        <p>'.$ln['data_hora'].'</p>
                    </li>
                    <hr>'; 
            }
        ?>  
        </div>
    </div>

    
    <!-- POP-UP -->
    <div class="popup" id="popup">
        <h1> PEDIDO </h1>
        <div class="resumo-popup">
            <div class="tabela">
                <h2>ITEM</h2>
                <h2>QUANTIDADE</h2>
            </div>
            <hr class="linha1">

        <?php
            include("conexao.php");

            $_SESSION['pedido'] = array();
            
            $sql = "SELECT PP.quantidade, PR.nome FROM pedido_produto PP
            JOIN pedido P ON P.id = PP.pedido_id
            JOIN produto PR ON PR.id = PP.produto_id
            GROUP BY P.id ORDER BY P.id DESC";

            $qr = mysqli_query($conexao, $sql);

            // $ln = mysqli_fetch_array($qr, MYSQLI_ASSOC);

            while ($ln = mysqli_fetch_assoc ($qr) ){
                echo'<li class="lista">
                            <p>'.$ln['nome'].'</p>
                            <p>'.$ln['quantidade'].'</p>
                        </li>
                        <hr>';
            }  

            dd($ln);
            function dd ($param){
                echo "<pre>";
                    print_r($param);
                echo "</pre>";
            }  
        ?>
    
    <script src="script.js"></script>
</body>
</html>