<?php

include '../conecta.php';
$email = $_GET['email'];

$sql = mysqli_query($conexao,"SELECT * from usuario_perfil where email='$email';");
$imgPiker = mysqli_fetch_array($sql);

echo $imgPiker['perfil_foto'];

?>