<?php
include "../conecta.php";


if(isset($_COOKIE['email1']) && isset($_COOKIE['id_Conversa'])  && isset($_COOKIE['emailDest'])){
	$id = $_COOKIE['id_Conversa'];
	$destinatario = $_COOKIE['emailDest'];
	$usuario = $_COOKIE['email1'];
	$mensagem=htmlspecialchars(mysqli_real_escape_string($conexao,$_POST['msg']));
	
	
	
	$sql = mysqli_query($conexao, "select * from chatTexto where usuario='$usuario' AND id_conversa=$id ORDER BY codigo_msg DESC");
	$lista = mysqli_fetch_array($sql);
	$id_msg = $lista["id_msg"];
	
									
									
	
	
	$comando = explode(" ", $mensagem);
	//$sql = "select * from chatTexto WHERE id_conversa = $id AND usuario = '$usuario';";
	
	if($comando[0] == "/cls"){
		$id_msg++;
		
			if($comando[1] > 0 ){//----- "/cls <int>" -> Deleta apenas um número de mensagens antigas
				
				for($i = 1; $i <= $comando[1]; $i++){
				mysqli_query($conexao, "DELETE FROM chatTexto WHERE id_conversa = $id AND usuario = '$usuario' AND id_msg = $i "); }
				
			}else if($comando[1] == "-f" || $comando[1] == "-F"){
							
							if($comando[2] > 0){
								mysqli_query($conexao, "UPDATE chatTexto SET  mensagem = '-/23^-msgApf' WHERE id_conversa = $id AND usuario = '$usuario' AND 
								remetente = '$usuario' AND codigo_msg = ".$comando[2].";"); 
								
								mysqli_query($conexao, "UPDATE chatTexto SET  mensagem = '-/23^-msgApf' WHERE id_conversa = $id AND usuario = '$destinatario' AND 
								remetente = '$usuario'AND codigo_msg = ".$comando[2].";");
								
							}else if($comando[2] == "all"){
								mysqli_query($conexao, "UPDATE chatTexto SET  mensagem = '-/23^-msgApf' WHERE id_conversa = $id AND usuario = '$usuario' AND remetente = '$usuario';"); 
								mysqli_query($conexao, "UPDATE chatTexto SET  mensagem = '-/23^-msgApf' WHERE id_conversa = $id AND usuario = '$destinatario' AND remetente = '$usuario';");
						
						}else{
							$close = 'true';
							include "chat/closeTip.php";
								$mensagem = mysqli_real_escape_string($conexao,"
										<b>Metódo de utilização Incorreto!</b> 
										<br>comando:<b style='color: purple'><i> /cls -f [id da mensagem]</i></b>
										<br>Nota: Caso queira apagar todas mensagens, no campo [id da mensagem] ponha <b>".'"all"'."</b><br>
								");
								$sql= "insert into chatTexto(id_msg,id_conversa,usuario,remetente,destinatario,mensagem,ip_usuario,hora_envio) values($id_msg,$id,'$usuario','&Console','$usuario','$mensagem','','')";
								mysqli_query($conexao,$sql);
							}
				
				
			}else{
			mysqli_query($conexao, "DELETE FROM chatTexto WHERE id_conversa = $id AND usuario = '$usuario';");
			}
	
	}

	

	
}
?>