<?php

$conexao = mysqli_connect ("localhost", "root", "", "gm-app");

if (mysqli_connect_error()) {
	echo "Falha na conexão: ".mysqli_connect_error();
}

?>