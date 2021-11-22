<?php
include '../conecta.php';

if	(isset($_COOKIE['usuario1']) && isset($_COOKIE['id_Conversa'])){
	 $usuario = $_COOKIE['usuario1'];
	 $email = $_COOKIE['email1']; 
	 $id = $_COOKIE['id_Conversa'];
	 $dest = $_COOKIE['destinatario'];

	$sql = "select * from chatTexto WHERE (usuario='$email' AND id_conversa= $id) order by hora_envio asc";
	 $result = mysqli_query($conexao,$sql);
	 $row = mysqli_num_rows($result);
	 
	 if($row > 0){
			while($dadosConversa = mysqli_fetch_array($result)){
			 $mensagem = $dadosConversa['mensagem'];
			 if($mensagem == "-/23^-msgApf"){$mensagem = "<span style='color: gray; opacity: 0.5'>[Mensagem Apagada!]</span>";}
				 
			 $ip = $dadosConversa['ip_usuario'];
			 
			 $remetente = $dadosConversa['remetente'];
			 
			 $codigo_msg = $dadosConversa['codigo_msg'];
			 
			 $data = $dadosConversa['hora_envio'];
			 $hora = substr($data,11,5); 
			 
			 if($remetente == "&Console"){

				  echo "
		<div id='closeTip'>
			 <div class='menssagem_left'>
					<label for='' id='menssagem_txt' style='word-wrap: break-word'>
					<span style='padding-left:90%; cursor: pointer' onclick='closeTip()'>X</span>
					<br>$mensagem
					<br><span style='font-size: 0.8vw; opacity: 50%; margin-left: 70%'>Console</span>
					</label>
					
				</div>
		</div>";
				 
			 }else if($email != $remetente){
				 
				echo "
				<div class='Left'>
					<p class='menssagem' title='#$codigo_msg'>$mensagem</p>
					<div class='envio'>$hora</div>
					</div>
				";
			 
			 }else{	

				echo "
				<div class='Right'>
					<p class='menssagem' title='#$codigo_msg'>$mensagem</p>
					<div class='envio'>$hora</div>
					</div>
				";

			 }
			 
			 
		 }
		 
	 }
	
}


if(isset($_COOKIE['scroll'])){$autoScroll = $_COOKIE['scroll'];}else{$autoScroll = 0;}
if	($row != $autoScroll){
	setcookie("scroll",$row);
	echo "<script>$('.conversa').animate({scrollTop: 9999}, 1000);</script>";
}



?>