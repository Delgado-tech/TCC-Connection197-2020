<?php
include "../conecta.php";
session_start();

$nomeAba = $_GET['nomeAba'];

if(isset($_COOKIE['email1'])){

    $email = $_COOKIE['email1'];


    //--------------------------------Error Logs
    if(isset($_SESSION['friendRequestError'])){$friendRequestError = $_SESSION['friendRequestError'];}else{$friendRequestError = '';}

    if($friendRequestError =='failHashtag'){
        $errorMsg = 'É obrigatório inserir uma Hashtag! Porfavor digite novamente! ';

    }else if($friendRequestError == 'smallTag'){
        $errorMsg = 'A tag insirida é muito curta! Porfavor insira uma tag válida!';

    }else if($friendRequestError == 'dontFound'){
        $errorMsg = 'Usuário não encontrado!';

    }else if($friendRequestError == 'yourEmail'){
        $errorMsg = 'Nós mesmos somos nosso melhor amigo, porém, não é possível enviar uma solicitação de <br> amizade para você mesmo.';

    }else if($friendRequestError == 'beenReceived'){
        $errorMsg = 'Você já enviou ou recebeu uma solicitação de amizade desse usuário!';

    }else if($friendRequestError == 'yourFriend'){
        $errorMsg = 'Esse usuário já é seu Amigo! Parabéns!';

    }else if($friendRequestError == 'unRequestUser'){
        $errorMsg = 'Esse usuário não está recebendo solicitações de amizade nesse momento!';

    }else{ $errorMsg = '';}

    



    //--------------------------------Successful Log

    if(isset($_SESSION['friendRequestSucess'])){
        $successfulMsg = 'Pedido de Amizade enviado com sucesso para '.$_SESSION['requestedName'];
    }else{$successfulMsg = '';}

    //--------------------------------
    session_destroy();




    if($nomeAba == 'Amigos'){

            include 'friendtab.php';

    }else if($nomeAba == 'Pedidos'){

            include 'requesttab.php';

    }else{

            echo "
                <b style='font-size: 1.5vw; font-family: Bahnschrift; line-height: 3vw; filter: var(--invertImg);'>Solicitação de Amizade</b>
                <br>
                <span style='font-size: 1.2vw; font-family: Bahnschrift; color: gray'>
                Para enviar um pedido de amizade para alguém, digite o nome da pessoa + sua tag,
                <br> ou se preferir acesse seu perfil e clique no botão  

                <span style='background-color:gray; color: white; padding: 0.5%; font-size: 0.8vw; border-radius: 5px'>
                Pedido de amizade</span>.</span>

                <br><br>

                <form method='POST' action='friendBar/friendRequest.php'>
                    <input type='text' name='userRequest'  id='inputSolicitacaoAmigos' class='searchUserFormatation' spellcheck='false' autocomplete='off' maxlength='54' placeholder='Escreva aqui o nome do usuário#0000'>
                    <input type='submit' value='Enviar'id='inputEnviarSolicitacaoAmigos'>
                </form>

                <span style='color: green; font-size: 1.2vw; font-family: Bahnschrift;'>$successfulMsg</span>
                <span style='color: red; font-size: 1.2vw; font-family: Bahnschrift;'>$errorMsg</span>
                






                <script>
                $.getScript('js/findUser.js');
                </script>
            
            ";
    }
}else{
    header('Refresh:0;url=../../index.php');
}







//------------------------------------Notificações--------------------------------------


$notificationAbaPedidos = mysqli_query($conexao,"SELECT * from amigos where destinatario = '$email' and confirmacao = 'N';");
if(mysqli_num_rows($notificationAbaPedidos) > 0){

    echo "
            <script>
            
                  $('#PedidosNotification').css({'display':'block'});   
                  $('#PedidosNotificationAba').css({'display':'block'});  
            </script>
    
    ";



}else{

    echo "
    <script>
    
          $('#PedidosNotification').css({'display':'none'}); 
          $('#PedidosNotificationAba').css({'display':'none'});   
    
    </script>

";


}



//--------------------------------------------------------------------------------------




?>