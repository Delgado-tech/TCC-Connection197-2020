<?php
if(isset($_COOKIE['email1']) || isset($_POST['recuperarSenha']) || isset($_GET['idCorpo'])){
  date_default_timezone_set('America/Sao_Paulo');
  $hora_envio = date('Y-m-d H:i:s');

include("class.phpmailer.php");
include "dadosEmail.php";
include "../conecta.php";

function email($para_email, $para_nome, $titulo, $assunto) {
  $email = new PHPMailer;
  $email->IsSMTP();
  $email->CharSet = 'UTF-8';
  $email->From = Email;
    $email->FromName = "Connection197";
    $email->Host       = "connection197.com.br";
    $email->SMTPSecure = 'ssl';
  $email->Port       = 465;
  $email->SMTPAuth   = true;
  $email->Username =   Email;
  $email->Password =   Password;
    
    
    $email->AddAddress($para_email, $para_nome);
    $email->MsgHTML($assunto);
    
    $email->Subject = $titulo;
    
    $email->Body = $assunto;
    
  $email->AltBody = "Para ver essa mensagem, use um programa compatível com HTML!";
    
    

  if ($email->Send()) {
    return "1";
  } else {
    //return $email->ErrorInfo;
    return "noExist";
  }

}
//-----------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------




//----------------------------------------------------------------------------------
//----------------------------------------------------------------------------------

@$idCorpo = $_GET['idCorpo'];
if(isset($_POST['recuperarSenha'])){$idCorpo = 'recuperar-senha';}
if(isset($_GET['newEmail'])){$newEmail = $_GET['newEmail'];}

include "corpo_email/".$idCorpo.".php";

if($idCorpo == 'redefinicao-email'){

  $sqlRC = mysqli_query($conexao,"SELECT * from redefinicao_conta where email='$emailDest'");
  if(mysqli_num_rows($sqlRC) > 0){
    mysqli_query($conexao,"DELETE from redefinicao_conta where email='$emailDest'");
  }

  $rand = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz000111222333444555666777888999";
  $id_redefinicao = substr(str_shuffle($rand),0,6);

  mysqli_query($conexao,"INSERT into redefinicao_conta(email,id_redefinicao,tipo_redefinicao,hora_envio) 
  values('$emailDest','$id_redefinicao','E','$hora_envio')");

  $corpo_assunto = str_replace('######',$id_redefinicao,$corpo_assunto);
  email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);

 echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/alterarConta.php?type=email&&re=1&&newEmail=$newEmail'); },1000); </script>";


}else if($idCorpo == 'confirm-redefinicao-email'){
  $id = $_GET['id'];
  if($newEmail != "" || $id != ""){
    if($emailDest != $newEmail){
      $sqlRC = mysqli_query($conexao,"SELECT * from redefinicao_conta where email='$emailDest' and tipo_redefinicao = 'E';");
      if(mysqli_num_rows($sqlRC) > 0){

        $dadosRC = mysqli_fetch_array($sqlRC);
        $id_redefinicao = $dadosRC['id_redefinicao'];

        if($id == $id_redefinicao){
          include "corpo_email/novo-email-redefinicao.php";

        $controle = email($newEmail, $nomeDest, $titulo_email2,$corpo_assunto2); //email novo
          email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);//email atual
          
          if($controle == 'noExist'){
            $error = 'O_email_solicitado_não_existe';
          }else{
            $sucess = "Ultimos_passos_enviados_para_o_email:_$newEmail";
            $error = '';
          }
          
        }else{
          $error = 'Código_inválido';
        }


      }else{
        $error = 'Código_de_validação_não_gerado_ou_expirado';
      }
    }else{
      $error = 'Você_não_pode_utilizar_o_email_atual!';
    }
  }else{
    $error = 'Aviso:_Preencha_todos_os_campos!';
  }

    if($error != ''){
    echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/alterarConta.php?type=email&&re=1&&newEmail=$newEmail&&error=$error'); },1000); </script>";
    }else{
    echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/configMenu.php?line=Conta&&sucess=$sucess'); },1000); </script>";
    }

}else if($idCorpo == 'redefinicao-senha'){

    
  $sqlRC = mysqli_query($conexao,"SELECT * from redefinicao_conta where email='$emailDest'");
  if(mysqli_num_rows($sqlRC) > 0){
    mysqli_query($conexao,"DELETE from redefinicao_conta where email='$emailDest'");
  }

  $rand = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz000111222333444555666777888999";
  $id_redefinicao = substr(str_shuffle($rand),0,6);

  mysqli_query($conexao,"INSERT into redefinicao_conta(email,id_redefinicao,tipo_redefinicao,hora_envio) 
  values('$emailDest','$id_redefinicao','S','$hora_envio')");

  $corpo_assunto = str_replace('######',$id_redefinicao,$corpo_assunto);
  email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);

 echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/alterarConta.php?type=senha&&re=1'); },1000); </script>";
  


}else if($idCorpo == 'confirm-redefinicao-senha'){

  $senhaA = $_GET['senhaA'];
  $senhaN = $_GET['senhaN'];
  $senhaNC = $_GET['senhaNC'];
  $id = $_GET['id'];

  if($senhaA != '' || $senhaN != '' || $senhaNC != '' || $id != ''){
    if($senhaA == $dados["senha"]){
      if($senhaN == $senhaNC){
        if(strlen($senhaN) >= 6){
            $sqlRC = mysqli_query($conexao,"SELECT * from redefinicao_conta where email='$emailDest' and tipo_redefinicao = 'S';");
                if(mysqli_num_rows($sqlRC) > 0){

                  $dadosRC = mysqli_fetch_array($sqlRC);
                  $id_redefinicao = $dadosRC['id_redefinicao'];
                  
                  if($id_redefinicao == $id){

                    $corpo_assunto = str_replace('######',$senhaN,$corpo_assunto);
                    email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);
                    $sucess = 'Senha_alterada_com_sucesso!';
                    $error = '';
                    
                    mysqli_query($conexao,"UPDATE usuario set senha='$senhaN' where email='$emailDest';");
                    mysqli_query($conexao,"DELETE from redefinicao_conta where email='$emailDest' and tipo_redefinicao='S';");


                  }else{
                    $error = 'Código_inválido!';
                  }


                }else{
                  $error = 'Código_de_validação_não_gerado_ou_expirado';
                }

            }else{
              $error = 'Senha_nova_muito_curta!_min:_6_caracteres.';
            }


            }else{
              $error = 'Confirmação_de_senha_não_bate!';
            }


        }else{
          $error = 'Senha_Atual_não_corresponde!';
        }

    }else{
      $error = 'Aviso:_Preencha_todos_os_campos!';
    }



    if($error != ''){
      echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/alterarConta.php?type=senha&&re=1&&error=$error'); },1000); </script>";
      }else{
      echo "<script> setTimeout(function(){ $('#contentConfigTarget').load('configBar/configMenu.php?line=Conta&&sucess=$sucess'); },1000); </script>";
      }


}else if($idCorpo == 'recuperar-senha'){
  session_start();
  if(!($corpo_assunto == 'noFound')){
    if(isset($_SESSION['errorRecuperarSenhaLogin'])){unset($_SESSION['errorRecuperarSenhaLogin']);}
    $corpo_assunto = str_replace('######',$dados["senha"],$corpo_assunto);
    email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);
    $sucess = 'Email enviado com sucesso!';
    $error = '';
    }else{
      $error = 'Email não cadastrado!';
    }
   
    if($error == ''){
      header("Refresh:0;url=../../index.php?fp=1");
      $_SESSION['errorRecuperarSenhaLogin'] = "<p id='notFound' style='color: green'>$sucess</p>";
    }else{
      header("Refresh:0;url=../../index.php?fp=1");
     $_SESSION['errorRecuperarSenhaLogin'] = "<p id='notFound' style='left:29%'>$error</p>";
     
    }

}else if($idCorpo == 'cadastro-conta'){
  session_start();
  $rand = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz000111222333444555666777888999";
  $id_verification = substr(str_shuffle($rand),0,6);

  $corpo_assunto = str_replace('######',$id_verification,$corpo_assunto);

  $controle = email($emailDest, $nomeDest, $titulo_email,$corpo_assunto);
  if($controle != 'noExist'){
    $sqlNC = mysqli_query($conexao, "select * from cadastro_conta where email = '$emailDest';");
      if(mysqli_num_rows($sqlNC) > 0){
        mysqli_query($conexao, "DELETE from cadastro_conta where email='$email';");
      }
    mysqli_query($conexao, "INSERT INTO cadastro_conta(email,senha,nome,nascimento,id_verificacao) values('$emailDest','$senha','$nomeDest','$nascimentoMysqli','$id_verification');");
    $_SESSION['emailConfirmCad'] = $emailDest;
    header('Refresh:0;url=../../cadastrar.php?v=1');


  }else{
    $_SESSION['errorCadastro'] = 'Esse email não existe!';
    header('Refresh:0;url=../../cadastrar.php?error=1');
  }




}



}else{
  header('Refresh:0;url=../index.php');
}

if(!(isset($_POST['recuperarSenha']) || isset($_GET['idCorpo']))){
?>

<img id='ConfigInfoAbaImg' src='src/icones/key.png'>
<b id='ConfigInfoAbaTxt'>Conta <span style='font-size: 1vw; color: rgba(0,0,0,0.5)'> [Enviando E-mail. Aguarde...]</span></b>
<?php } ?>
