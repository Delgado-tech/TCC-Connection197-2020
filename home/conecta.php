<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "chat";

$conexao = mysqli_connect($host,$user,$pass,$banco);
mysqli_select_db($conexao,$banco);

mysqli_set_charset($conexao,"utf8mb4");
mysqli_query($conexao,"SET collation_connection = utf8mb4_unicode_ci");



?>