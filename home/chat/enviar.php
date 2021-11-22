<?php
include "../conecta.php";

date_default_timezone_set('America/Sao_Paulo');

if(isset($_COOKIE['usuario1']) && isset($_COOKIE['id_Conversa'])){
	$id = $_COOKIE['id_Conversa'];
	$destinatario = $_COOKIE['emailDest'];
	$remetente = $_COOKIE['email1'];
	$mensagem=htmlspecialchars(mysqli_real_escape_string($conexao,$_POST['msg']));
	$hora=date('Y-m-d H:i:s');
	$ip=$_SERVER['REMOTE_ADDR'];
	

	
									$sql = mysqli_query($conexao, "select * from chatTexto where usuario='$remetente' AND id_conversa=$id ORDER BY codigo_msg DESC");
									
									$lista = mysqli_fetch_array($sql);
									$id_msg = $lista["id_msg"]; $id_msg++;
									
								
									
	$sql= "insert into chatTexto(id_msg,id_conversa,usuario,remetente,destinatario,mensagem,ip_usuario,hora_envio) values($id_msg,$id,'$remetente','$remetente','$destinatario','$mensagem','$ip','$hora')";
	mysqli_query($conexao,$sql);
	
	$sql = mysqli_query($conexao, "select * from chatTexto where usuario='$remetente' AND id_conversa=$id ORDER BY codigo_msg DESC");
	$lista = mysqli_fetch_array($sql);
	$codigo_msg = $lista["codigo_msg"]; 
	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
									
									$sql = mysqli_query($conexao, "select * from chatTexto where usuario='$destinatario' AND id_conversa=$id ORDER BY codigo_msg DESC");
									$lista = mysqli_fetch_array($sql);
									$id_msg = $lista["id_msg"]; $id_msg++;
	
	$sql2= "insert into chatTexto(id_msg,codigo_msg,id_conversa,usuario,remetente,destinatario,mensagem,ip_usuario,hora_envio) values($id_msg,$codigo_msg,$id,'$destinatario','$remetente','$destinatario','$mensagem','$ip','$hora')";
	mysqli_query($conexao,$sql2);
	
	$sql3 = mysqli_query($conexao, "select * from chatTexto where usuario='$remetente'");
	$rowChat = mysqli_num_rows($sql3);
	
	setcookie('scroll',$rowChat,time()+10);
	
}


?>