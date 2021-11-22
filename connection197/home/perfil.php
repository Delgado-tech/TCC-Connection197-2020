<?php

include "conecta.php";

if(isset($_COOKIE['id_Conversa'])){unset($_COOKIE['id_Conversa']);		setcookie('id_Conversa',null, -1); }
if(isset($_COOKIE['destinatario'])){unset($_COOKIE['id_Conversa']);		setcookie('destinatario',null, -1);}
if(isset($_COOKIE['emailDest'])){unset($_COOKIE['id_Conversa']);			setcookie('emailDest',null, -1);}

if(isset($_COOKIE['email1'])){
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Connection - Perfil</title>
	<link rel="icon" href="../icons/iconLogo.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/publicacao.css">
	<link rel="stylesheet" href="css/perfil.css">
	<link rel="stylesheet" href="css/publicar.css">
	<link rel="stylesheet" href="css/friend-config-bar.css">
	<link rel="stylesheet" href="css/configurationBar.css">

</head>
<body id="#f">

<?php include 'fixed-friendModal.php'; 
	  include 'configurationBar.php'; 
?>

	<div class="navbar">
		<img src="src/logo.png" alt="" id="logo">
		<a href="index.php"><img src="src/icones/icoHome.png" id="icoHome"></a>
		<a href="grupo.php"><img src="src/icones/icoGroup.png" alt="" id="icoGroup"></a>
		<a href="perfil.php"><img src="src/icones/icoPerfil.png" id="icoPerfil" style="box-shadow: 0 1px black;"></a>
	</div>
	
	<div class="perfil">
		<div class="fotoPerfil"><img src="src/images/09.jpg" alt=""></div>
		<div class="infoPerfil">
			<div class="identPerfil">
				<div class="nomePerfil"><b>Nome de usuário</b></div>
				<div class="userPerfil">#user</div>
			</div>
		</div>
		<div class="descricaoPerfil">
			<!-- 133 caracteres maximos -->
			<p>Descrição com até 133 caracteres</p>
		</div>
		<div class="icoCam">
			<a href="#publicar"><img src="src/icones/camera.png" alt=""></a>
		</div>
	</div>

	<div id="publicar">
		<div class="headerPublicar">
			<div class="fotoPublicar"><img src="src/images/09.jpg" alt=""></div>
			<div class="infoPublicar">
				<div class="identPublicar">
					<div class="nomePublicar"><b>Nome de usuário</b></div>
					<div class="userPublicar">#user</div>
					<div class="fecharPublicar"><a href="#"><img src="src/icones/cancel.png" alt=""></a></div>
				</div>
			</div>
			<form action="">
				<textarea name="" id="" cols="67" rows="3" class="descricaoPublicar" placeholder="Escreva sua descrição com até 133 caracteres"></textarea>
				<input type="file" class="enviarFoto">
				<input type="submit" class="enviar" value="Publicar">
			</form>
			
		</div>
	</div>

	<div class="timeLine">
		<div class="publicacao">
			<div class="headerPub">
				<div class="fotoPub"><img src="src/images/09.jpg" alt=""></div>
				<div class="infoPub">
					<div class="identPub">
						<div class="nomePub"><b>Nome de usuário</b></div>
						<div class="userPub">#user</div>
						<div class="dataPub">5min</div>
					</div>
				</div>
				<div class="descricao">
					<!-- 133 caracteres maximos -->
					<p>Descrição com até 133 caracteres</p>
				</div>
			</div>
			<div class="pub">
				<img src="src/images/17.jpg" alt="">
			</div>
			<div class="bottomPub">
				<div class="like"><a href="#"><img src="src/icones/like.png" alt=""></a></div>
				<div class="comment"><img src="src/icones/comment.png" alt=""></div>
				<div class="send"><img src="src/icones/send.png" alt=""></div>
			</div>
		</div>
		
		<div class="publicacao">
			<div class="headerPub">
				<div class="fotoPub"><img src="src/icones/chat.png" alt=""></div>
				<div class="infoPub">
					<div class="identPub">
						<div class="nomePub"><b>Nome de usuário</b></div>
						<div class="userPub">#user</div>
						<div class="dataPub">5min</div>
					</div>
				</div>
				<div class="descricao">
					<!-- 133 caracteres maximos -->
					<p>Descrição com até 133 caracteres</p>
				</div>
			</div>
			<div class="pub">
				<img src="src/icones/chat.png" alt="">
			</div>
			<div class="bottomPub">
				<div class="like"><a href="#"><img src="src/icones/like.png" alt=""></a></div>
				<div class="comment"><img src="src/icones/comment.png" alt=""></div>
				<div class="send"><img src="src/icones/send.png" alt=""></div>
			</div>
		</div>

		<script>
		$.getScript("js/home.js");
		$.getScript("js/amigosBar.js");
		$.getScript("js/findUser.js");
		
		</script>


	</body>
	</html>

<?php
include 'configBar/pageStyle.php';
}else{
	header("Refresh:0;url=../index.php");
}


?>