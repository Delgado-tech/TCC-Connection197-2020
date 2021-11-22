<?php

if(isset($_GET['sucess'])){$sucess = str_replace("_"," ",$_GET['sucess']);}else{$sucess = '';}

$domain = explode("@",$email);

$sqlContaConfigs = mysqli_query($conexao,"SELECT * from usuario_configs where email='$email';");
$dados = mysqli_fetch_array($sqlContaConfigs);

$privacidade[0] = $dados['receber_solicitacao'];
$privacidade[1] = $dados['visualizacao_perfil'];
$privacidade[2] = $dados['visualizacao_avatar'];

if($privacidade[0] == 'S'){     $switch[0] = 'checked';}else{      $switch[0] = '';}
if($privacidade[1] == 'G'){     $switch[1] = 'checked';}else{      $switch[1] = '';}
if($privacidade[2] == 'G'){     $switch[2] = 'checked';}else{      $switch[2] = '';}


if(isset($_GET['upPriv'])){
$id = $_GET['upPriv'];

    if($id == 1){
        if($privacidade[1] == 'G'){$switch[1] = ''; $type='A';}else{$switch[1] = 'checked';  $type='G';}
        mysqli_query($conexao,"UPDATE usuario_configs set visualizacao_perfil='$type' where email='$email';");

    }else if($id == 2){
        if($privacidade[2] == 'G'){$switch[2] = ''; $type='A';}else{$switch[2] = 'checked'; $type='G';}
        mysqli_query($conexao,"UPDATE usuario_configs set visualizacao_avatar='$type' where email='$email';");

    }else if($id == 3){
        if($privacidade[0] == 'S'){$switch[0] = ''; $type='N';}else{$switch[0] = 'checked'; $type='S';}
        mysqli_query($conexao,"UPDATE usuario_configs set receber_solicitacao='$type' where email='$email';");

    }


}


?>







<img id='ConfigInfoAbaImg' src='src/icones/key.png'>
<b id='ConfigInfoAbaTxt'>Conta</b>
<p id='infoContaCodigoInput' style='color:darkgreen; top:5%;'><?php echo $sucess; ?></p>

<?php if($domain[1] != "betaTester.com"){ ?>
<img src='src/icones/edit.png' id='ContaEmailEditConfig' onclick='rdc("email")'>
<img src='src/icones/edit.png' id='ContaSenhaEditConfig' onclick='rdc("senha")'>
<?php }else{ ?>
<img src='src/icones/lock.png' id='ContaEmailEditConfig' style='cursor: none; opacity: 50%;'>
<img src='src/icones/lock.png' id='ContaSenhaEditConfig' style='cursor: none; opacity: 50%;'>
<?php } ?>


<b id='ContaEmailTxtConfig'>Email</b>
<b id='ContaSenhaTxtConfig'>Senha</b>


<?php
   $sqlConta =  mysqli_query($conexao,"select * from usuario where email = '$email';");
   $dadosConta = mysqli_fetch_array($sqlConta);
   $senha = str_repeat('*',strlen($dadosConta['senha']));

   if(strlen($email) > 35){
       $email = substr($email,0,35).'<br>'.substr($email,35,25);
   }


   echo "

        <b id='ContaEmailConfig'>$email</b>
        <b id='ContaSenhaConfig'>$senha</b>

    ";
   
?>

<div id='ContaPrivacidadeConfig'>
    <b>Privacidade</b><br>
    <span style='font-size: 1.3vw; line-height: 110%;'>Ativo: Visualização/Recebimento <b style='color: green;filter: var(--invertImg);'>Global</b> <br>
    Desativado: Visualização/Recebimento <b>Amigos</b></span>
    <br><br>
    *Visualização de perfil<br>
    *Visualização de avatar<br>
    *Receber solicitações
    
    
<!-----------------------------------SWITCH'S------------------------------------->
  <label id='ContaConfigSwitch' class="switch" style='top:8vw;' onclick='updatePrivacidade(1);'>
  <input type="checkbox" <?php echo $switch[1]; ?>>
  <span class="slider"></span>
  </label>
<!---------------------------------------------------------------------------------->
<label id='ContaConfigSwitch' class="switch" style='top:10.3vw;' onclick='updatePrivacidade(2);'>
  <input type="checkbox" <?php echo $switch[2]; ?>>
  <span class="slider"></span>
  </label>
<!---------------------------------------------------------------------------------->
<label id='ContaConfigSwitch' class="switch" style='top:12.6vw;' onclick='updatePrivacidade(3);'> 
  <input type="checkbox" <?php echo $switch[0]; ?>>
  <span class="slider"></span>
  </label>
<!---------------------------------------------------------------------------------->

<script type='text/javascript'>

   function updatePrivacidade(id_privacidade){

    $("#contentConfigTarget").load('configBar/configMenu.php?line=Conta&&upPriv='+id_privacidade);
      
}

function rdc(type){
          //  setInterval(function(){
            $("#contentConfigTarget").load('configBar/alterarConta.php?type='+type); 
        //},400);  

 }



</script>



</div>
