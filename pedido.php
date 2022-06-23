<?php

    $p = isset($_GET["produto"])?$_GET["produto"]:"NENHUM PRODUTO SELECIONADO";
    $qtd = isset($_GET["qtd"])?$_GET["qtd"]:0;

    echo "RESUMO DO PEDIDO: <br>";

    echo "$p - $qtd";
?>