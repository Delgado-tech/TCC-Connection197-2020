<?php
include 'home/conecta.php';
session_start();

$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$nascimento = mysqli_real_escape_string($conexao,$_POST['dataNascimento']);

$email = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);
$senhaC = mysqli_real_escape_string($conexao,$_POST['senhaC']);
/*
echo "Nome: ".$nome."<br>";
echo "nascimento: ".$nascimento."<br>";

echo "email: ".$email."<br>";
echo "senha: ".$senha."<br>";
echo "senhaC: ".$senhaC."<br>";
*/
$sql = mysqli_query($conexao,"select * from usuario where email = '$email';");
if(mysqli_num_rows($sql) > 0){
    $_SESSION['errorCadastro'] = 'Esse email já está registrado!';
    header('Refresh:0;url=cadastrar.php?error=1');   
}else if(strlen($nascimento) < 10){
    $_SESSION['errorCadastro'] = 'Data de nascimento incompleta!';
    header('Refresh:0;url=cadastrar.php?error=1');      
}else if(date('Y') - substr($nascimento,6,4) < 13){
    $_SESSION['errorCadastro'] = 'Você tem que ter no minímo 13 anos para se cadastrar!';
    header('Refresh:0;url=cadastrar.php?error=1');      
}else if(strlen($senha) < 6){
    $_SESSION['errorCadastro'] = 'Senha registrada muito curta!';
    header('Refresh:0;url=cadastrar.php?error=1');    
}else if($senha != $senhaC){
    $_SESSION['errorCadastro'] = 'Senhas não se coincidem!';
    header('Refresh:0;url=cadastrar.php?error=1');   
}else{
    header("Refresh:0;home/sendEmail/sendEmail.php?idCorpo=cadastro-conta&&nome=$nome&&nascimento=$nascimento&&email=$email&&senha=$senha");
}

?>