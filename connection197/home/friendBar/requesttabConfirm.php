<?php
date_default_timezone_set('America/Sao_Paulo');
include '../conecta.php';


$email = $_COOKIE['email1'];
$confirmation = $_GET['c'];
$emailDest = $_GET['e'];
$hora_envio = date('Y-m-d H:i:s');



if($confirmation == 'true'){


    $sql = mysqli_query($conexao,"SELECT * from amigos where ((remetente = '$email' and destinatario = '$emailDest') or (remetente = '$emailDest' and destinatario = '$email')) and confirmacao = 'N';");
    $dados = mysqli_fetch_array($sql);
    
    if($dados['destinatario'] == $email){
        mysqli_query($conexao,"insert into amigos(remetente,destinatario,remNome,desNome,hora_envio,confirmacao) values('$email','$emailDest','".$dados['remNome']."','".$dados['desNome']."','$hora_envio','S');");
 
    }else{
        mysqli_query($conexao,"insert into amigos(remetente,destinatario,remNome,desNome,hora_envio,confirmacao) values('$emailDest','$email','".$dados['desNome']."','".$dados['remNome']."','$hora_envio','S');");
 
    }

    mysqli_query($conexao,"UPDATE amigos SET confirmacao = 'S',hora_envio = '$hora_envio' WHERE remetente = '$emailDest' and destinatario = '$email';");
    header('Refresh:0;url=../index.php#Amigos');





}else if($confirmation == 'false'){
    mysqli_query($conexao,"DELETE FROM amigos WHERE remetente = '$emailDest' and destinatario = '$email';");
    header('Refresh:0;url=../index.php#Amigos');

}else if($confirmation == 'cancel'){
    mysqli_query($conexao,"DELETE FROM amigos WHERE remetente = '$email' and destinatario = '$emailDest';");
    header('Refresh:0;url=../index.php#Amigos');

}else if($confirmation == 'unFollow'){
    mysqli_query($conexao,"DELETE FROM amigos WHERE remetente = '$email' and destinatario = '$emailDest';");
    mysqli_query($conexao,"DELETE FROM amigos WHERE remetente = '$emailDest' and destinatario = '$email';");
    header('Refresh:0;url=../index.php#Amigos');

}else{
    header('Refresh:0;url=../index.php');

}




?>