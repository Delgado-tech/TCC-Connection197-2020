<?php

	$email1 = $email;
	$destinatario1 = base64_decode($emailDest);
	
	$sql1 = mysqli_query($conexao,"select * from chatTexto where (remetente='$email1' and destinatario='$destinatario1')  or (remetente='$destinatario1' and destinatario='$email1')");
	$rows = mysqli_num_rows($sql1);
	
	if($rows > 0){
		$piker = mysqli_fetch_array($sql1);
		$id = $piker['id_conversa'];
	}else{
		$i = 1;
		while($i == 1){
			$randomID = rand(0,1000000000);
			$sql1 = mysqli_query($conexao,"select * from chatTexto where id_conversa = '$randomID' ");
			$rows = mysqli_num_rows($sql1);
			
			if($rows == 0){
				$id = $randomID;
				$i++;
			}	
			
		}
		
		
	}
	
	//echo $rows."<br>";


?>