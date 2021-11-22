<?php


$sqlRequests = mysqli_query($conexao,"SELECT * from amigos where remetente = '$email' and confirmacao = 'S' order by desNome ASC;");

if(mysqli_num_rows($sqlRequests) > 0){


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
        if($perfil_foto == null){
            $fotoSrc = "src/perfil_randColor/$randColor.jpg";
        }else{
            $fotoSrc = "getImage/getImagePerfil.php?email=$emailDest";
            $firstWord = '';
        }


        $bio = $perfil['perfil_bio'];
        if(strlen($bio) > 75){
            $bio = substr($bio,0,75)."...";
        }else if($bio == ''){
            $bio = 'Oi a todos! Neste momento estou sem nenhum status definido!';

        }



                $sqlChatTexto = mysqli_query($conexao,"SELECT * from chatTexto where (remetente = '$email' and destinatario = '$emailDest') or (remetente = '$emailDest' and destinatario = '$email');");
                if(mysqli_num_rows($sqlChatTexto) > 0){
                    $idPiker = mysqli_fetch_array($sqlChatTexto);
                    $idCoded = base64_encode($idPiker['id_conversa']);

                }else{
                    $idCoded = base64_encode(rand(100000000,999999999));
                }

                $usuarioCoded = base64_encode($nome);
                $emailDestC = base64_encode($emailDest);






        echo "
        
            <div id='barraUsuarioAmigos'>
                <img id='perfilImgAmigos' src='$fotoSrc'>
                <img id='conversationIconAmigos' src='src/icones/conversation.png' onclick=".'"window.location = '."'index.php?d=$usuarioCoded&&e=$emailDestC&&i=$idCoded#chatAtivo'".'"'.">
                <img id='unfollowIconAmigos' src='src/icones/unfollow.png' onclick=".'"'."removeFriendConfirm('$emailDest','$nome')".'"'.">
                <span id='letraNomeIconAmigos'>$firstWord</span>
                <span id='nomeUsuarioAmigos'>$nome</span>

                <div id='bioStatusAmigos'><b>$bio</b></div>
            </div>



            <script type='text/javascript'>

                function removeFriendConfirm(emailDest,nome){

                    var alertConfirm = confirm('Você tem certeza que deseja excluir '+nome+' de seus amigos?');

                    if(alertConfirm == true){
                        window.location = 'friendBar/requesttabConfirm.php?c=unFollow&&e='+emailDest;
                    }
                    

                }

            </script>
        
        ";

    }

}else{
    echo "
    <span style='font-size: 2vw; font-family: Bahnschrift; color: gray'>
        Oh, parece que você não tem nenhum amigo... O que você ainda está fazendo aqui? Vá interagir na rede!
    </span>
";
}

?>