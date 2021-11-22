<?php

header('Refresh:0;url=../../cadastrar.php?v=1');

$nomeDest = mysqli_real_escape_string($conexao,$_GET['nome']);
$emailDest = mysqli_real_escape_string($conexao,$_GET['email']);
$nascimento = mysqli_real_escape_string($conexao,$_GET['nascimento']);

$nascimentoMysqli = substr($nascimento,6,4)."-".substr($nascimento,3,2)."-".substr($nascimento,0,2)." 00:00:00";

$senha = mysqli_real_escape_string($conexao,$_GET['senha']);

$titulo_email = "Criação de conta!";

$corpo_assunto = "

<html><body>
    
<div style='background-color:rgba(0,0,0,0.1); width: 100%; height: 100%; padding: 20% 0%; font-family:arial; text-decoration: none; '>
<div style='background-color: rgba(255,255,255,0.85); width: 50%; height: auto; margin-left: 26%; border-radius: 20px;'>
<br>
<h1 style='text-align: center;font-family:Bahnschrift; font-size: 1.6vw;'>Connection197</h1>
<br><br>
<p style='padding: 0% 5%; font-size: 1.3vw; word-wrap: break-word; text-decoration: none;'>
<b style='color: rgba(0,0,0,0.4);'>Olá $nomeDest,</b> <br><br>
Ficamos felizes de saber que você deseja entrar em nossa comunidade! Estamos quase lá, para terminar o seu cadastro utilize o código gerado abaixo para verificar sua conta! 
<br><br><br>
<span style='line-height: 0.76'>
<b style='font-family:Bahnschrift; font-size: 1vw; color: rgba(0,0,0,0.6)'>Código de verificação</b>
<br><br>
<b style='font-family:Bahnschrift; font-size: 1.5vw; cursor: pointer; user-select: all;'>######</b>
</span>
<br><br><br>
<br><br><br>
</p>
</div>
</div>
    
</body></html>  
 

";

?>