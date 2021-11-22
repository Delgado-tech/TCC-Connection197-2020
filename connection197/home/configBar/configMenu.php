<?php
if(isset($_COOKIE['email1'])){

include '../conecta.php';

    $typeConfig = $_GET['line'];
    $email = $_COOKIE['email1'];

    if($typeConfig == 'Perfil'){

        include 'configPerfil.php';

    }else if($typeConfig == 'Conta'){

        include 'configConta.php';

    }else if($typeConfig == 'Aparencia'){

        include 'configAparencia.php';

    }else if($typeConfig == 'Ajuda'){
 ?>

        <img id='ConfigInfoAbaImg' src='src/icones/help.png'>
        <b id='ConfigInfoAbaTxt'>Ajuda</b>

        <p id='configAparenciaInfotxt'>
        Para que possamos te ajudar, envie uma mensagem para
        support@connection197.com.br utilizando o seu email cadastrado
        na plataforma, ou envie uma mensagem para um usuário com
        tag <b>Staffer</b>.
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        Versão da plataforma: <b>BETA</b>
        </p>

<?php

    }else{
        header('Refresh:0;url=index.php#f');
    }


}else{
    header('Refresh:0;url=../../index.php');
}


// ------------------------------------- Incluir arquivo JavaScript
echo "

    <script> 
    $.getScript('js/configBar.js'); 
    </script>

    ";


?>

