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
	<title>Connection - Grupo</title>
	<link rel="icon" href="../icons/iconLogo.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/chatSideBar.css">
	<link rel="stylesheet" href="css/publicacao.css">
	<link rel="stylesheet" href="css/chatGrupos.css">
	<link rel="stylesheet" href="css/newGrupo.css">
	<link rel="stylesheet" href="css/friend-config-bar.css">
	<link rel="stylesheet" href="css/configurationBar.css">
</head>
<body id="#f">

<?php include 'fixed-friendModal.php'; 
	  include 'configurationBar.php'; 
?>

	<div class="navbar">
		<img src="src/logo.png" alt="" id="logo">
		<a href="index.php"><img src="src/icones/icoHome.png" alt="" id="icoHome"></a>
		<a href="grupo.php"><img src="src/icones/icoGroup.png" id="icoGroup" style="box-shadow: 0 1px black;"></a>
		<a href="perfil.php"><img src="src/icones/icoPerfil.png" alt="" id="icoPerfil"></a>
	</div>
	<div class="chatSideBar">
		<div class="newChat">
			<form action="">
				<input type="text" placeholder="Pesquisar grupos">
			</form>
		</div>
		<div class="iconeChat" id='grupo'>
			<a href=""><img src="src/icones/adicionarChat.svg" alt=""></a>
		</div>
		<div class="iconeChat" id='grupo'>
			<img src="src/images/28.jpg" alt="">
		</div>
		<div class="iconeChat" id='grupo'> 
			<img src="src/images/20.jpg" alt="" style="border: 1px solid black">
		</div>
		<div class="iconeChat" id='grupo'>
			<img src="src/images/23.jpg" alt="">
		</div>
	</div>

	<div class="timeLine">
		<div class="publicacao">
			<div class="headerPub">
				<div class="fotoPub"><img src="src/images/20.jpg" alt=""></div>
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
				<img src="src/images/20.jpg" alt="">
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

		<div class="chatGrupo">
			<div class="infoGrupoChat">
				<div class="nomeGrupo"><b>Nome do Grupo</b></div>
				<div class="fotoGrupo"><img src="src/images/20.jpg" alt=""></div>
			</div>
			<div class="chat">
			<div class="Left">
				<div class="nomeUser"><b>Nome do usuario</b></div>
				<p class="menssagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget ante neque. Fusce blandit tellus nec dignissim pulvinar.</p>
				<div class="envio">18:55</div>
			</div>
			<div class="Left">
				<div class="nomeUser"><b>Nome do usuario</b></div>
				<p class="menssagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget ante neque. Fusce blandit tellus nec dignissim pulvinar.</p>
				<div class="envio">18:55</div>
			</div>
			<div class="emoji"><img src="src/icones/emoji.png" alt=""></div>
			<div class="digitarMenssagem">
				<form action="">
					<input type="text" placeholder="Digite uma menssagem">
				</form>
			</div>
			<div class="enviar"><img src="src/icones/send.png" alt=""></div>
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