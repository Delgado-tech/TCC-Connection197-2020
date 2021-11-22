<?php

include '../conecta.php';
date_default_timezone_set('America/Sao_Paulo');
session_start();

$email = $_COOKIE['email1'];
$sqlYourname = mysqli_query($conexao,"select * from usuario where email = '$email'");
$piker = mysqli_fetch_array($sqlYourname);
$remName = $piker['nome'];

if(!(strpos($_POST['userRequest'],'#') == false)){
$User = explode('#',$_POST['userRequest']);

    if(strlen($User[1]) == 4 && $User[1] != ''){


    $sql = mysqli_query($conexao,"select * from usuario where nome = '".$User[0]."' and tag = ".$User[1]."; ");
    if(mysqli_num_rows($sql) > 0){

            $dados = mysqli_fetch_array($sql);
            $emailDest = $dados['email'];


            if($emailDest != $email){

                $sqlAmigos = mysqli_query($conexao,"select * from amigos where (remetente = '$email' and destinatario = '$emailDest') or (remetente = '$emailDest' and destinatario = '$email');");
                    if(mysqli_num_rows($sqlAmigos) > 0){

                        $dadosAmigos = mysqli_fetch_array($sqlAmigos);
                        $confirmacao = $dadosAmigos['confirmacao'];

                        if($confirmacao == 'N'){
                            $_SESSION['friendRequestError'] = 'beenReceived';
                            header('Refresh:0;url=../index.php?#Amigos');
                        }else{
                            $_SESSION['friendRequestError'] = 'yourFriend';
                            header('Refresh:0;url=../index.php?#Amigos');
                        }

                    }else{

//-------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------Usuário Encontrado-------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------
                $sqlPrivacidade = mysqli_query($conexao,"select * from usuario_configs where email = '$emailDest'");
                $privacidade = mysqli_fetch_array($sqlPrivacidade);
                    if($privacidade['receber_solicitacao'] == 'N'){
                        $_SESSION['friendRequestError'] = 'unRequestUser';
                        header('Refresh:0;url=../index.php?#Amigos');
                    }else{



                    $hora_envio = date('Y-m-d H:i:s');
                    
                    mysqli_query($conexao,"insert into amigos(remetente,destinatario,remNome,desNome,hora_envio,confirmacao) values('$email','$emailDest','$remName','".$User[0]."','$hora_envio','N');");
                    $_SESSION['friendRequestSucess'] = 'sucess';
                    $_SESSION['requestedName'] = $User[0].'#'.$User[1];
                    header('Refresh:0;url=../index.php?#Amigos');
                    }

//-------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------    
                    }          
                }else{
                    $_SESSION['friendRequestError'] = 'yourEmail';
                    header('Refresh:0;url=../index.php?#Amigos');
                }



        }else{
        $_SESSION['friendRequestError'] = 'dontFound';
        header('Refresh:0;url=../index.php?#Amigos');
        }


    }else{
        $_SESSION['friendRequestError'] = 'smallTag';
        header('Refresh:0;url=../index.php?#Amigos');
    }


}else{
    $_SESSION['friendRequestError'] = 'failHashtag';
    header('Refresh:0;url=../index.php?#Amigos');
}



?>