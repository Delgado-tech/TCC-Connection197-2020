<?php
include "../conecta.php";


if(isset($_POST['close'])){$close = $_POST['close'];}

if($close == 'true'){
		if(isset($_COOKIE['email1']) && isset($_COOKIE['id_Conversa'])){
			$id = $_COOKIE['id_Conversa'];
			$usuario = $_COOKIE['email1'];
			
			mysqli_query($conexao,"DELETE FROM chatTexto WHERE id_conversa = $id AND usuario = '$usuario' AND remetente = '&Console'");
		}
}
?>