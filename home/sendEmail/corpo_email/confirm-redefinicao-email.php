<?php
$email = $_COOKIE['email1'];
$sql = mysqli_query($conexao,"SELECT * from usuario where email = '$email';");
$dados = mysqli_fetch_array($sql);

$emailDest = $dados["email"]; 
$nomeDest = $dados["nome"];
$tag = $dados["tag"];


$titulo_email = "Redefinição de E-mail";

$corpo_assunto = "

<html><body>
    
<div style='background-color:rgba(0,0,0,0.1); width: 100%; height: 100%; padding: 20% 0%; font-family:arial; text-decoration: none; '>
<div style='background-color: rgba(255,255,255,0.85); width: 50%; height: auto; margin-left: 26%; border-radius: 20px;'>
<br>
<h1 style='text-align: center;font-family:Bahnschrift; font-size: 1.6vw;'>Connection197</h1>
<br><br>
<p style='padding: 0% 5%; font-size: 1.3vw; word-wrap: break-word; text-decoration: none;'>
<b style='color: rgba(0,0,0,0.4);'>Olá $nomeDest#$tag,</b> <br><br>
Estamos quase terminando sua alteração de e-mail! Caso não tenha sido solicitado por você, entre o quanto antes em contato conosco (<span style='color: blue'>support@connection197.com.br</span>)! 
<br><br>
As últimas instruções foram passadas no seu novo e-mail <span style='color: darkgreen'>$newEmail</span>, caso você tenha solicitado ao e-mail errado ou mudou de ideia <a href='https://connection197.com.br/home/pedidos_redefinicoes.php' target='_blank' style='color:black;'><b>clique aqui</b></a> para desfazer o pedido.
<br><br><br>
<br><br><br>
<br><br><br>
</p>
</div>
</div>
    
</body></html> 
 

";


?>