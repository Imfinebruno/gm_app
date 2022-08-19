<?php

session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{ 
  header('location:index.php');
  }

$logado = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/epis.css" rel="stylesheet">
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

    <div class="container-epis">

        <form  class="epis" action="pedido.php" method="post">

           <ul>
                <?php
                    require("conexao.php");
                    $sql = "SELECT * FROM produto WHERE categoria_id = 2";
                    $qr = mysqli_query($conexao, $sql);

                    while ($ln = mysqli_fetch_assoc ($qr) ) {
                        echo'<li class="lista">
                                    <div class="checkbox">
                                        <input type="checkbox" name="produto[]" class="checkbox" value="'.$ln['nome'].'">
                                        <input type="null" name="idProduto[]" class="checkbox" value="'.$ln['id'].'">
                                        
                                        <label>'.$ln['nome'].'</label>
                                    </div>
                                    <input type="number" name="qtd[]" min="0" max="1000"></input>
                            </li>';
                    }
                ?>                 
            </ul>
            
            <footer>
                    <input type="submit" name="solicitar" id="solicitar" value="Solicitar">
            </footer>
        </form>

    </div>
   

    <script src="script.js"></script>
</body>
</html>