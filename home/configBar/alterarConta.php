<?php
if(isset($_COOKIE['email1'])){
    include '../conecta.php';
    $email = $_COOKIE['email1'];


    $sql = mysqli_query($conexao,"SELECT * from usuario where email = '$email';");
    $dados = mysqli_fetch_array($sql);
    $nome = $dados["nome"];

    if($_GET['type'] == "email"){

            
            
            if(isset($_GET['re'])){$re = "re";}else{$re="";}

            if(isset($_GET['error'])){
                $error = str_replace("_"," ",$_GET['error']);}else{$error = '';}
  
            if(isset($_GET['newEmail'])){$newEmail = $_GET['newEmail'];}else{$newEmail = '';}


        ?>

        <img id='ConfigInfoAbaImg' src='src/icones/key.png'>
        <b id='ConfigInfoAbaTxt'>Conta <span style='font-size: 1vw; color: rgba(0,0,0,0.5)'> [Redefinição de E-mail]</span></b>



        <b id='ContaEmailTxtConfig'>Email atual</b>
        <b id='ContaEmailTxtConfig' style='top:30%; left:9%;'>*Email novo</b>
        <b id='ContaEmailTxtConfig' style='top:45%; left:25%;'>Código de Verificação</b>

        <input type='txt' value='<?php echo $newEmail; ?>' placeholder='email@domain.com' name='CENI' id='ContaEmailNovoInput' autocomplete='off' spellcheck='false' maxlength='60' required>
        <input type='text' placeholder='###### ' name='CEDI' id='ContaEmailCodigoInput' autocomplete='off' spellcheck='false' maxlength='6' required>

        <p id='infoContaCodigoInput'>
            <b style='color: black; text-decoration: underline;cursor: pointer;' onclick='sendEmail()'>Clique aqui</b>
            para <?php echo $re; ?>enviar o código de verificação para o seu e-mail.</p>


        <p id='infoContaCodigoInput' style='top:65%;color:red'>
            <?php echo $error; ?>
        </p>

        <button id='btnAlterarContaConfig' onclick='altEmail()'><b>Alterar</b></button>

        <?php
        echo "
        <b id='ContaEmailConfig' style='cursor:not-allowed; user-select:none'>$email</b>





        <script> 
        $.getScript('js/configBar.js'); 

        function sendEmail(){
            var newEmail = $('#ContaEmailNovoInput').val();
            $('#contentConfigTarget').load('sendEmail/sendEmail.php?idCorpo=redefinicao-email&&newEmail='+newEmail);  
            
        }

        function altEmail(){
            var id = $('#ContaEmailCodigoInput').val();
            var newEmail = $('#ContaEmailNovoInput').val();
            $('#contentConfigTarget').load('sendEmail/sendEmail.php?idCorpo=confirm-redefinicao-email&&id='+id+'&&newEmail='+newEmail);  

        }

        </script>

        ";
    }else{
        if(isset($_GET['re'])){$re = "re";}else{$re="";}


        if(isset($_GET['error'])){
            $error = str_replace("_"," ",$_GET['error']);}else{$error = '';}
        
        
            $senha = $dados["senha"];

    ?>

    <img id='ConfigInfoAbaImg' src='src/icones/key.png'>
    <b id='ConfigInfoAbaTxt'>Conta <span style='font-size: 1vw; color: rgba(0,0,0,0.5)'> [Redefinição de Senha]</span></b>



    <b id='ContaEmailTxtConfig'>Senha atual</b>
    <b id='ContaEmailTxtConfig' style='top:30%; left:9%;'>*Senha nova</b>
    <b id='ContaEmailTxtConfig' style='top:40%; left:9%;'>*Senha nova [confirmação]</b>
    <b id='ContaEmailTxtConfig' style='top:55%; left:25%;'>Código de Verificação</b>

    <input type='password' id='ContaEmailNovoInput' class='senhaAtualConta' style='top:23%' maxlength='16' required>
    <input type='password' id='ContaEmailNovoInput' class='novaSenhaConta' name='CENI' autocomplete='off' spellcheck='false' maxlength='16' required>
    <input type='password' id='ContaEmailNovoInput' class='novaSenhaConfirmConta' style='top:43%' maxlength='16' required>
    
    <input type='text' placeholder='###### ' name='CEDI' id='ContaEmailCodigoInput' autocomplete='off' spellcheck='false' maxlength='6' style='top:60%' required>

    <p id='infoContaCodigoInput' style='top:63%;'>
        <b style='color: black; text-decoration: underline;cursor: pointer;' onclick='sendEmail()'>Clique aqui</b>
        para <?php echo $re; ?>enviar o código de verificação para o seu e-mail.</p>


    <p id='infoContaCodigoInput' style='top:75%;color:red'>
        <?php echo $error; ?>
    </p>

    <button id='btnAlterarContaConfig' onclick='altEmail()'><b>Alterar</b></button>

    <?php
    echo "

    <script> 
    $.getScript('js/configBar.js'); 

    function sendEmail(){

        $('#contentConfigTarget').load('sendEmail/sendEmail.php?idCorpo=redefinicao-senha');  
        
    }

    function altEmail(){
        var id = $('#ContaEmailCodigoInput').val();
        var senhaA = $('.senhaAtualConta').val();
        var senhaN = $('.novaSenhaConta').val();
        var senhaNC = $('.novaSenhaConfirmConta').val();

        $('#contentConfigTarget').load('sendEmail/sendEmail.php?idCorpo=confirm-redefinicao-senha&&id='+id+'&&senhaA='+senhaA+'&&senhaN='+senhaN+'&&senhaNC='+senhaNC);  
        
    }

    </script>

    ";


        }
}
?>

