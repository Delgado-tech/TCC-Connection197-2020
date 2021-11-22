<?php

$sqlVerification = mysqli_query($conexao,"select * FROM chatTexto where (remetente  = '".$dados['email']."' or destinatario = '".$dados['email']."') and usuario = '$email' order by hora_envio desc;");
$row = mysqli_num_rows($sqlVerification);

if($row < 1){

        $sql2 = mysqli_query($conexao,"select * from usuario_perfil where email = '".$dados["email"]."';");
        $dadosUP = mysqli_fetch_array($sql2);

        $perfil_foto = $dadosUP["perfil_foto"];




        $sqlPrivacidade = mysqli_query($conexao,"select * from usuario_configs where email = '".$dados["email"]."'");
        $privacidade = mysqli_fetch_array($sqlPrivacidade);
        
        if($privacidade['visualizacao_avatar'] == 'A'){
            $row = mysqli_query($conexao,"SELECT * from amigos where remetente = '$email' and destinatario = '".$dados["email"]."' and confirmacao = 'S';");
            
            if(mysqli_num_rows($row) < 1){
                $perfil_foto = null; 
            }
        }



        if($perfil_foto == null){
            $imgSrc = "src/perfil_randColor/".$dadosUP['randColor'].".jpg";
            $letraNome = substr($dados["nome"],0,1);
        }else{
            $imgSrc = "getImage/getImagePerfil.php?email=".$dados["email"];
            $letraNome = '';
        }


        $emailDest = base64_encode($dados["email"]);
        $usuarioCoded = base64_encode($dados["nome"]);
        $idCoded = base64_encode(rand(100000000,999999999));




            echo "
            
            <div class='iconeChat'> 
            
            <div class='tooltip'>
            <a href='index.php?d=$usuarioCoded&&e=$emailDest&&i=$idCoded#chatAtivo'>
            <span class='letraNomeIcon'>$letraNome</span>
            
        

            <img style='border: 2px lightgray dashed;' src='$imgSrc' alt=''></a>

            <span class='tooltiptext' id='$tooltipID'>
            &nbsp ".$dados['nome']."<i style='font-size: 13px;color: lightgray'>#".$dados['tag']."</i><br>
            &nbsp <b style='color: #696969'>*Clique para iniciar uma <br> &nbsp nova conversa!</b>
            </span>

            </div> </div>
            ";


}

?>