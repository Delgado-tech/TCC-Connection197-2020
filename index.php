<?php

if(isset($_GET['d'])){
if(isset($_COOKIE['usuario1'])){unset($_COOKIE['usuario1']);		setcookie('usuario1',null, -1); }
if(isset($_COOKIE['email1'])){unset($_COOKIE['email1']);		setcookie('email1',null, -1);}
if(isset($_COOKIE['tag1'])){unset($_COOKIE['tag1']);			setcookie('tag1',null, -1);}
header("Refresh:0;url=index.php");

}



session_start();
if(isset($_SESSION['errorCadastro'])){unset($_SESSION['errorCadastro']);}
if(isset($_SESSION["notFoundUserinLogin"])){$notFound = $_SESSION["notFoundUserinLogin"];}else{$notFound = 0;}
if(isset($_GET['fp'])){$_SESSION["forgotPasswordLogin"] = $_GET['fp']; header('Refresh:0;url=index.php');}
if(isset($_SESSION["forgotPasswordLogin"])){$fp = $_SESSION["forgotPasswordLogin"];}else{$fp = 0;}
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Connection - Login</title>
	<link rel="icon" href="icons/iconLogo.png">
</head>
<body>
	<div class="container">
	
<?php
if($fp == 0){
		if($notFound == 1){
		echo "<p id='notFound'>Email ou senha incorretos!</p>";
		$_SESSION["notFoundUserinLogin"] = 0;
}
?>


	<h1 >LOG IN</h1>



	<form action="loginVal.php" method="POST" >
		<div class="tbox">
			
			<input type="text" placeholder="Email" id="email" name="email" autocomplete="off" spellcheck="false" maxlength="60" required>
		</div>
		<div class="tbox">
			
			<input type="password" placeholder="Senha" id="senha" name="senha" maxlength="32" required>	
		</div>	
		<a href="html/home.html"><input type="submit" class="btn"></a>
	</form>

	<a id='linkNC' href='index.php?fp=1'>Esqueci minha Senha</a>
	<a id='linkNC' href='cadastrar.php' style='left: 55%'>Criar nova Conta</a>

</div>

</body>
</html>

<?php
}else{
	if(isset($_SESSION['errorRecuperarSenhaLogin'])){echo $_SESSION['errorRecuperarSenhaLogin'];}
	
?>
	<p id='title'>Recuperar Senha</p>
	<p style='position: absolute; top: 25%; padding: 0% 5%;'>Para recuperar sua senha, insira o seu e-mail no campo abaixo e clique em enviar!</p>
	<form action="home/sendEmail/sendEmail.php" method="POST" >
		<div class="tbox">
			<input type="text" style='margin-top:20%' placeholder="Email" id="email" name="recuperarSenha" autocomplete="off" spellcheck="false" maxlength="60" required>
		</div>
		<a href="html/home.html"><input type="submit" value='Enviar e-mail' class="btn"></a>
	</form>
	<a href='index.php?fp=0' id='linkNC' style='font-size: 1.2vw'>Voltar</a>
<?php
 if(!isset($_GET['fp'])){unset($_SESSION['errorRecuperarSenhaLogin']);}
}


?>