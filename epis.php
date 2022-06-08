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

        <a id="logo"href=""><img src="img/logo-GM.png" alt=""></a>

        <nav id="nav">
            <ul id="menu">
                <li><a href="">HISTÓRICO</a></li>
                <!-- <li><a href="">USUÁRIO E SENHA</a></li> -->
                <li><a href="logout.php">SAIR <-</a></li>
            </ul>
        
        <img id="btn-mobile" src="img/setting1.png" alt="">
        </nav>

    </header>

    <div class="container-epis">

        <form  class="epis" action="">
            <ul>
                <li class="lista">
                    <div>
                        <input type="checkbox">
                        EPI's
                    </div>
                    <input type="number" id="qtd" name="qtd" value="0" size="3" maxlenght="3" min="0" max="1000" step="1" >
                </li>
                <li class="lista">
                    <div>
                        <input type="checkbox">
                        CAPACETE
                    </div>
                    <input type="number" id="qtd" name="qtd" value="0" size="3" maxlenght="3" min="0" max="1000" step="1" >
                </li>
                <li class="lista">
                    <div>
                        <input type="checkbox">
                        LUVAS
                    </div>
                    <input type="number" id="qtd" name="qtd" value="0" size="3" maxlenght="3" min="0" max="1000" step="1" >
                </li>
                <li class="lista">
                    <div>
                        <input type="checkbox">
                        ÓCULOS DE PROTEÇÃO
                    </div>
                    <input type="number" id="qtd" name="qtd" value="0" size="3" maxlenght="3" min="0" max="1000" step="1" >
                </li>
            
             </ul>
             
        </form>

    </div>

    <footer >
        <input type="submit" name="solicitar" id="solicitar" value="Solicitar">
    </footer>
    

    <script src="script.js"></script>
</body>
</html>