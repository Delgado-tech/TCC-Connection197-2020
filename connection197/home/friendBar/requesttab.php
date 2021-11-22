<?php

$sqlRequests = mysqli_query($conexao,"select * from amigos where (remetente or destinatario) = '$email' and confirmacao = 'N';");
if(mysqli_num_rows($sqlRequests) > 0){

$notificationType[0] = 'Enviou uma solicitação de amizade';
$notificationType[1] = 'Você enviou uma solicitação de amizade';


while($dados = mysqli_fetch_array($sqlRequests)){
    $remetente = $dados['remetente'];
    $destinatario = $dados['destinatario'];


    $sqlPerfil = mysqli_query($conexao,"select * from usuario,usuario_perfil where ((usuario.email = '$remetente' or usuario.email = '$destinatario') and usuario.email != '$email') and
    ((usuario_perfil.email = '$remetente' or usuario_perfil.email = '$destinatario') and usuario_perfil.email != '$email');");

    $perfil = mysqli_fetch_array($sqlPerfil);

    $emailDest = $perfil['email'];
    $nome = $perfil['nome'];
    $randColor = $perfil['randColor'];

    $firstWord = substr($nome,0,1);
    $perfil_foto = $perfil['perfil_foto'];



    $sqlPrivacidade = mysqli_query($conexao,"select * from usuario_configs where email = '$emailDest'");
    $privacidade = mysqli_fetch_array($sqlPrivacidade);
    if($privacidade['visualizacao_avatar'] == 'A'){
        $row = mysqli_query($conexao,"SELECT * from amigos where remetente = '$email' and destinatario = '$emailDest' and confirmacao = 'S';");
        if(mysqli_num_rows($row) < 1){
            $perfil_foto = null; 
        }
    }


    
    if($perfil_foto == null){
        $fotoSrc = "src/perfil_randColor/$randColor.jpg";
    }else{
        $fotoSrc = "getImage/getImagePerfil.php?email=$emailDest";
        $firstWord = '';
    }






        if($destinatario == $email){

        echo "
            
        <div id='barraUsuarioAmigos'>
            <img id='perfilImgAmigos' src='$fotoSrc'>
            <span id='aceitarConviteAmigos' style='left:76%' onclick='window.location = ".'"friendBar/requesttabConfirm.php?c=true&&e='.$emailDest.'"'."'>Aceitar</span>
            <span id='aceitarConviteAmigos' style='left: 87%' onclick='window.location = ".'"friendBar/requesttabConfirm.php?c=false&&e='.$emailDest.'"'."'>Recusar</span>
            <span id='letraNomeIconAmigos'>$firstWord</span>
            <span id='nomeUsuarioAmigos'>$nome</span>

            <div id='bioStatusAmigos'><b>".$notificationType[0]."</b></div>
        </div>

        ";






        }else{


        echo "
            
        <div id='barraUsuarioAmigos'>
            <img id='perfilImgAmigos' src='$fotoSrc'>
            <span id='aceitarConviteAmigos' style='left:85%' onclick='window.location = ".'"friendBar/requesttabConfirm.php?c=cancel&&e='.$emailDest.'"'."'>Cancelar</span>
            <span id='letraNomeIconAmigos'>$firstWord</span>
            <span id='nomeUsuarioAmigos'>$nome</span>

            <div id='bioStatusAmigos'><b>".$notificationType[1]."</b></div>
        </div>
            
        ";
        }


    }

}else{
    echo "
        <span style='font-size: 2vw; font-family: Bahnschrift; color: gray'>
            Não há pedidos de amizades pendentes. Enquanto isso aventure-se pela rede!
        </span>
    ";
}


?>