<?php
date_default_timezone_set('America/Sao_Paulo');

include "../conecta.php";

$nomePU = $_GET['nomePU'];
$tagPU = $_GET['tagPU'];
if($tagPU == 'undefined'){$tagPU = ''; $tag = "";}else{$tag = "#".$tagPU;}

$_SESSION["barraPesquisaChat"] = $nomePU.$tag;

if(isset($_COOKIE['email1'])){

    $email = $_COOKIE['email1'];

   
    
    $i=0;$id=0;$tooltipID=0;

    if(!($nomePU == "")){    

        $sqlUsuarios =  mysqli_query($conexao,"select * from usuario where nome like '".$nomePU."%' and tag like '".$tagPU."%'");
       
       
        while($seletor = mysqli_fetch_array($sqlUsuarios)){
            
            $email2 = $seletor['email']; 
            $sql = mysqli_query($conexao,"select * FROM chatTexto where (remetente  = '$email2' or destinatario = '$email2') and usuario = '$email' order by hora_envio desc;");

                   
                   while($dados = mysqli_fetch_array($sql)){
                    $conversaEncontrada = true;
                     include "pesquisarConversaDados.php";

                   }
                   
                   
                    

        
        }

      
        $sqlNovaConversa = mysqli_query($conexao,"select * FROM usuario where email != '$email' and nome like '".$nomePU."%' and tag like '".$tagPU."%';");
            while($dados = mysqli_fetch_array($sqlNovaConversa)){
              
                 include "iniciarNovaConversa.php";

               }
       
        echo "<br><br><br><br><br><br><br><br>";


    }else{

        $sql = mysqli_query($conexao,"select * FROM chatTexto where (remetente  = '$email' or destinatario = '$email') and usuario = '$email' order by hora_envio desc;");
        while($dados = mysqli_fetch_array($sql)){

        
        include "pesquisarConversaDados.php";

        } echo "<br><br><br><br><br><br><br><br>";

    }





}

?>