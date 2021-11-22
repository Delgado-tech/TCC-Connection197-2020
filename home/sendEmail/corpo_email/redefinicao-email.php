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
Recebemos recentemente um pedido para redefinição de e-mail vindo da sua conta, caso não tenha sido você nos contate o quanto antes (<span style='color: blue'>support@connection197.com.br</span>)! 
<br><br>
Caso tenha sido você utilize o código de verificação abaixo: 
<br><br><br>
<span style='line-height: 0.76'>
<b style='font-family:Bahnschrift; font-size: 1vw; color: rgba(0,0,0,0.6)'>Código de verificação</b>
<br><br>
<b style='font-family:Bahnschrift; font-size: 1.5vw; cursor: pointer; user-select: all;'>######</b>
</span>
<br><br><br>
</p>
</div>
</div>
    
</body></html>  

";


?>