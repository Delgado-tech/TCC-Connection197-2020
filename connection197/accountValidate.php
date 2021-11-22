<?php
session_start();
if(isset($_SESSION['emailConfirmCad'])){
    include 'home/conecta.php';
    
    $email = $_SESSION['emailConfirmCad'];
    $id_validation = mysqli_real_escape_string($conexao,$_POST['idValidation']);
    $sql = mysqli_query($conexao,"SELECT * from cadastro_conta where email = '$email' and id_verificacao = '$id_validation';");

    if(mysqli_num_rows($sql) > 0){
        
        $dados = mysqli_fetch_array($sql);
        $senha = $dados['senha'];
        $nome = $dados['nome'];
        $nascimento = $dados['nascimento'];

        $tag = rand(1000,9999);
        $randColor = rand(0,5);
        $sqlTag = mysqli_query($conexao,"select * from usuario where nome = '$nome' and tag = $tag and email != '$email'");
        

        while(mysqli_num_rows($sqlTag) > 0){

            $tag = rand(1000,9999);
            $sqlTag = mysqli_query($conexao,"select * from usuario where nome = '$nome' and tag = $tag");

        }

        mysqli_query($conexao, "INSERT INTO usuario(nome,tag,email,senha,autenticacao) 
        values('$nome',$tag,'$email','$senha','S');");

        mysqli_query($conexao, "INSERT INTO usuario_perfil(email,perfil_autoridade,perfil_idade,randColor) 
        values('$email','E','$nascimento','$randColor');");

        mysqli_query($conexao, "INSERT INTO usuario_configs(email,receber_solicitacao,visualizacao_perfil,visualizacao_avatar,estilo_pagina) 
        values('$email','S','G','G',0);");

        mysqli_query($conexao,"DELETE from cadastro_conta where email='$email';");
        header('Refresh:0;url=index.php');

    }else{
        $_SESSION['errorCadastro'] = 'Código expirado ou inválido!';
        header('Refresh:0;url=cadastrar.php?v=1');
    }

}
?>