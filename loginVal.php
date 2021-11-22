<?php

if(isset($_COOKIE['usuario1'])){unset($_COOKIE['usuario1']);		setcookie('usuario1',null, -1); }
if(isset($_COOKIE['email1'])){unset($_COOKIE['email1']);		setcookie('email1',null, -1);}
if(isset($_COOKIE['tag1'])){unset($_COOKIE['tag1']);			setcookie('tag1',null, -1);}

session_start();
include "home/conecta.php";

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$pass = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = mysqli_query($conexao, "select * from usuario where email = lower('$email') and senha = '$pass'");

if(mysqli_num_rows($sql) > 0){
	
	$lista = mysqli_fetch_array($sql);
	$nome = $lista['nome'];
	$tag = $lista['tag'];
	
	setcookie('usuario1',$nome, time()+(3600*24)); 
	setcookie('email1',$email, time()+(3600*24)); 
	setcookie('tag1',$tag, time()+(3600*24));
	
	header("Refresh:0;url=home/index.php");
	
	
	
}else{
	echo "<script>history.go(-1);</script>";
	$_SESSION["notFoundUserinLogin"] = 1;
}


?>