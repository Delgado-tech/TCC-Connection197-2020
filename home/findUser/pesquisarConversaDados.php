<?php


$idArray[$i] = $id;
$id = $dados["id_conversa"];
                    
if(!(in_array($id, $idArray))){
    $idCoded = base64_encode($id);	
    

    if(!($dados['usuario'] == $dados['destinatario'])){$emailDest = $dados['destinatario'];
    }else{$emailDest = $dados['remetente'];}


    $sqlNomeDest = mysqli_query($conexao,"select * from usuario where email = '$emailDest'");
    $dadosDest = mysqli_fetch_array($sqlNomeDest);

    $usuarioCoded = base64_encode($dadosDest['nome']);
    $emailDest = base64_encode($emailDest);
    //----------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------
    
   

    $sql2 = mysqli_query($conexao,"select * from usuario_perfil where email = '$email';");
    $dadosUP = mysqli_fetch_array($sql2); //UP = usuario_perfil    


    $sql3 = mysqli_query($conexao,"select * from usuario where email = '$email';");
    $dadosU = mysqli_fetch_array($sql3); //UP = usuario  

    
    $remetente = $dados["remetente"];
    $destinatario = $dados["destinatario"];

    $datetime = $dados['hora_envio'];  
    $hora_envio = date_create($datetime);


    if(date("d") == date_format($hora_envio, 'd')){
        $ultimaMsg = " as ". date_format($hora_envio, 'H:i');

    }else{
        $ultimaMsg = " em <br> &nbsp&nbsp&nbsp".date_format($hora_envio, 'd/m/Y');
    }

                echo "
                
                <div class='iconeChat'> 
                
                <div class='tooltip'>
                <a href='index.php?d=$usuarioCoded&&e=$emailDest&&i=$idCoded#chatAtivo'>
                <span class='letraNomeIcon'>";


                $sqlDest = mysqli_query($conexao,"select * from usuario where email = '$destinatario';");
                $sqlDest2 = mysqli_query($conexao,"select * from usuario_perfil where email = '$destinatario';");

                $sqlRem = mysqli_query($conexao,"select * from usuario where email = '$remetente';");
                $sqlRem2 = mysqli_query($conexao,"select * from usuario_perfil where email = '$remetente';");
                        if(!($remetente == $email)){
                            
                            $dadosNome = mysqli_fetch_array($sqlRem);
                            $dadosCor = mysqli_fetch_array($sqlRem2);
                            $letraNome =  substr($dadosNome['nome'],0,1);
                        }
                        else if(!($destinatario == $email)){
                            $dadosNome = mysqli_fetch_array($sqlDest);
                            $dadosCor = mysqli_fetch_array($sqlDest2);
                            $letraNome = substr($dadosNome['nome'],0,1);
                        }



                        $sqlPrivacidade = mysqli_query($conexao,"select * from usuario_configs where email = '".$dadosNome["email"]."'");
                        $privacidade = mysqli_fetch_array($sqlPrivacidade);
                        
                        if($privacidade['visualizacao_avatar'] == 'A'){
                            $row = mysqli_query($conexao,"SELECT * from amigos where remetente = '$email' and destinatario = '".$dadosNome["email"]."' and confirmacao = 'S';");
                            
                            if(mysqli_num_rows($row) < 1){
                                $dadosCor["perfil_foto"] = null; 
                            }
                        }


                        if($dadosCor["perfil_foto"] == null){
                            $imgSrc = "src/perfil_randColor/".$dadosCor['randColor'].".jpg";
                        }else{
                            $imgSrc = "getImage/getImagePerfil.php?email=".$dadosNome["email"];
                            $letraNome = '';
                        }



                echo "
                $letraNome
                </span>
                
              

                <img src='$imgSrc' alt=''></a>

                <span class='tooltiptext' id='$tooltipID'>
                &nbsp ".$dadosNome['nome']."<i style='font-size: 13px;color: lightgray'>#".$dadosNome['tag']."</i><br>
                &nbsp Última Mensagem".$ultimaMsg."
                </span>

                </div> </div>
                ";



    

    //----------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------
    }$i++;$tooltipID++;


?>