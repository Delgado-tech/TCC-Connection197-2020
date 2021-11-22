<?php
session_start();
include "conecta.php";

if(isset($_SESSION["barraPesquisaChat"])){$barraPesquisa = $_SESSION["barraPesquisaChat"];}else{$barraPesquisa = '';}

if(isset($_COOKIE['id_Conversa'])){unset($_COOKIE['id_Conversa']);		setcookie('id_Conversa',null, -1); }
if(isset($_COOKIE['destinatario'])){unset($_COOKIE['id_Conversa']);		setcookie('destinatario',null, -1);}
if(isset($_COOKIE['emailDest'])){unset($_COOKIE['id_Conversa']);			setcookie('emailDest',null, -1);}

if(isset($_COOKIE['email1'])){
	
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Connection - Home</title>
	<link rel="icon" href="../icons/iconLogo.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/switch.css">
	<link rel="stylesheet" href="css/chatSideBar.css">
	<link rel="stylesheet" href="css/publicacao.css">
	<link rel="stylesheet" href="css/perfilTooltip.css">
	<link rel="stylesheet" href="css/chat.css">
	<link rel="stylesheet" href="css/friend-config-bar.css">
	<link rel="stylesheet" href="css/configurationBar.css">
	
	
</head>
<body id="#f">

<?php include 'fixed-friendModal.php'; 
	  include 'configurationBar.php'; 
	  
?>


	<div class="navbar">
		<img src="src/logo.png" alt="" id="logo">
		<a href="index.php"><img src="src/icones/icoHome.png" alt="" id="icoHome" style="box-shadow: 0 1px black;"></a>
		<a href="grupo.php"><img src="src/icones/icoGroup.png" alt="" id="icoGroup"></a>
		<a href="perfil.php"><img src="src/icones/icoPerfil.png" alt="" id="icoPerfil"></a>
	</div>

	



	<div id="chatAtivo">
	<a href="index.php#f"><div class="fecharChat"><img src="src/icones/cancel.png" alt=""></div></a>

		<?php 
								$myEmail = $_COOKIE['email1'];

								$destinatario = filter_input(INPUT_GET, 'd', FILTER_DEFAULT);
								$email = filter_input(INPUT_GET, 'e', FILTER_DEFAULT);
								$id = filter_input(INPUT_GET, 'i', FILTER_DEFAULT);
								

								setcookie('id_Conversa',base64_decode($id));
								setcookie('destinatario',base64_decode($destinatario));
								setcookie('emailDest',base64_decode($email));
								
								$destinatario = base64_decode($destinatario);

								if(strlen($destinatario) > 14){$dest = substr($destinatario, 0, 11); $dest.="...";}else{$dest = $destinatario;}
								
								echo '<div class="nomeChat"><b>'.$dest.'</b></div>';

								//----------------------------------------
								//foto Perfil Chat
								//----------------------------------------

								$sqlImg = mysqli_query($conexao,"SELECT * from usuario_perfil,usuario_configs where 
								usuario_perfil.email = '".base64_decode($email)."' and usuario_configs.email = '".base64_decode($email)."'");
								$imgPiker = mysqli_fetch_array($sqlImg);
							



								if($imgPiker['visualizacao_avatar'] == 'A'){
									$row = mysqli_query($conexao,"SELECT * from amigos where remetente = '$myEmail' and destinatario = '".base64_decode($email)."' and confirmacao = 'S';");
									if(mysqli_num_rows($row) < 1){
									$imgPiker['perfil_foto'] = null; 
									}
								}




								if($imgPiker['randColor'] == ''){$imgPiker['randColor'] = '0';}
								if($imgPiker['perfil_foto'] == null){
									$imgSrc = 'src/perfil_randColor/'.$imgPiker['randColor'].'.jpg';
									$letraNome = substr($destinatario,0,1);
								}else{
									$imgSrc = 'getImage/getImagePerfil.php?email='.base64_decode($email);
									$letraNome = '';
								}
								

								echo "
								<div class='fotoChat'><img src='$imgSrc' alt=''></div>
								<span id='chatLetraPerfil'>$letraNome</span>
								";

								//----------------------------------------
								//----------------------------------------
								//----------------------------------------
		 
								?>

		
		
		<div class="chat">		
			<div class="conversa">
		</div>
			<div class="emoji"><img src="src/icones/emoji.png" onclick="emoji()" alt=""></div>
			
			<div class="digitarMenssagem">
				<form method="POST"  onsubmit="enviando(); return false;">
					<textarea id="msg" placeholder="Digite uma menssagem" autocomplete="off"></textarea>
				</form>
			</div>
			<div class="enviar"><img src="src/icones/send.png" alt=""></div></div>	
			<div class="emojiBar" id="emojis"></div>
		</div>
	
	
<!-- ---------------------------------------------------------------------------------- -->	



	<div class="timeLine">
		<div class="publicacao">
			<div class="headerPub">
				<div class="fotoPub"><img src="src/images/05.jpeg" alt=""></div>
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
				<img src="src/images/06.jpg" alt="">
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



		<div class="chatSideBar">
		<div class="newChat">
			<form action="">
				<input type="text" id="pesquisar_usuarios" class='searchUserFormatation' placeholder="Pesquisar Usuários" autocomplete="off" spellcheck="false" value="<?php echo $barraPesquisa; ?>">
			</form>
<!-- -------------------------------------------------------------- Conversas Recentes -->			
		</div>
		<div class="iconeChat">
			
		</div>
<!-- ---------------------------------------------------------------------------------- -->	
		
	</div>


	<script type="text/javascript">
	$.getScript("js/home.js");
	$.getScript("js/chat.js");
	$.getScript("js/emojis.js");
	$.getScript("js/amigosBar.js");
	$.getScript("js/findUser.js");
	$.getScript('js/pageStyle.js');
	

	
	</script>


</body>
</html>

<?php
include 'configBar/pageStyle.php';
}else{
	header("Refresh:0;url=../index.php");
}


?>