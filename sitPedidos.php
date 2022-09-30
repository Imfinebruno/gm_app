<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/sitPedidos.css" rel="stylesheet">
    <title>PEDIDOS</title>
</head>
<body>

    <header id="header">
        <a id="logo"href="inicio-2.php"><img src="img/logo-GM.png" alt=""></a>
        <nav id="nav">
            <ul id="menu">
                <li><a href="sitPedidos.php">HISTÓRICO</a></li>
                <li><a href="logout.php">SAIR <-</a></li>
            </ul>
        <img id="btn-mobile" src="img/setting1.png" alt="">
        </nav>

    </header>

    <div class="pedido" id="pedido">
        <h1> PEDIDOS </h1>
        <div class="resumo">
            <div class="tabela">
                <h2>Nº DO PEDIDO</h2>
                <!-- <span>clique para abrir o pedido</span> -->
                <h2>DATA</h2>
                <h2>STATUS</h2>
            </div>
            <hr class="linha1">

        <?php
            include("conexao.php");

            $_SESSION['pedidos'] = array();

            $sql = "SELECT P.id, P.data_hora, P.status FROM pedido_produto PP JOIN pedido P ON P.id = PP.pedido_id GROUP BY P.id ORDER BY P.id DESC";
            $qr = mysqli_query($conexao, $sql); 
          
            while($ln = mysqli_fetch_assoc($qr)){
                echo'<li class="lista">
                        <p> Pedido: <a onclick = SitPedido(this.id) id ="'.$ln['id'].'">'.$ln['id'].'</a></p>
                        <p>'.$ln['data_hora'].'</p>
                        <p>'.$ln['status'].'</p>
                    </li>
                    <hr>'; 
                }

           
            // $alterar = null;
            // $passedId = null;

            // if(isset($_POST['enviado'])){
            //     $alterar = $_POST['enviado'];
            //     $passedId= $_POST['id'];
            // }
            // else if (isset($_POST['concluído'])){
            //     $alterar = $_POST['concluído'];
            //     $passedId= $_POST['id'];
            // }
            // else if (isset($_POST['cancelado'])){
            //     $alterar = $_POST['cancelado'];
            //     $passedId= $_POST['id'];
            // }
            

            // $alterar = "UPDATE pedido SET status = '{$alterar}' WHERE id = '{$passedId}'";
            // mysqli_query($conexao, $alterar);

        ?>  
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>