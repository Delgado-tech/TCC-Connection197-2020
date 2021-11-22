<?php

if(isset($_GET['type'])){
    if($_GET['type'] == "Perfil"){$alert = 'As alterações de perfil foram salvas com Sucesso!';}

echo "
<script> setTimeout(function(){alert('$alert');},500); 
         setTimeout(function(){window.location='index.php#f';},800); 
</script>
";

}

?>


<img id="configIcon" src="src/icones/configs.png" title='Configurações'>

<div id="ConfigMenu">

    <div id="ConfigMenuData">
    <div id='contentConfigTarget'></div>
      <span id='contentConfig'>

      <img id="configIcon" src="src/icones/configs.png"> 
         <b id='titleConfig'>Configurações</b>

        
        <!-- ---------------------------------------------------- -->
        <a class='itensConfig' id='line1' onclick='itemConfig("Perfil")'>
         <img class="itensImgConfig" src="src/icones/user.png"> 
         <b>Perfil</b></a><br>
        <!-- ---------------------------------------------------- -->
        <a class='itensConfig' id='line2' onclick='itemConfig("Conta")'>
         <img class="itensImgConfig" src="src/icones/key.png"> 
         <b>Conta</b></a><br>
        <!-- ---------------------------------------------------- -->
        <a class='itensConfig' id='line3' onclick='itemConfig("Aparencia")'>
         <img class="itensImgConfig" src="src/icones/edit.png"> 
         <b>Aparência</b></a><br>
        <!-- ---------------------------------------------------- -->
         <a class='itensConfig' id='line4' onclick='itemConfig("Ajuda")'>
             <img class="itensImgConfig" src="src/icones/help.png"> 
         <b>Ajuda</b></a><br>
        <!-- ---------------------------------------------------- -->

        <?php
            $email = $_COOKIE['email1'];
            $sql = mysqli_query($conexao,"SELECT * from usuario where email = '$email';");
            $dados = mysqli_fetch_array($sql);
            $nometag = $dados["nome"]."#".$dados['tag'];
            
            if(strlen($nometag) > 40){
                $nome = substr($nometag,0,20)."<br>".substr($nometag,19,20)."<br>".substr($nometag,39,20);
                $textLines = 3;
            }else if(strlen($nometag) > 20){
                $nome = substr($nometag,0,20)."<br>".substr($nometag,20,20);
                $textLines = 2;
            }else{
                $nome = $nometag;
                $textLines = 1;
            }

            echo "
                <div id='contaIdData'>
                <b id='contaIdText'>Conta:<br></b>
                <b id='contaIdConfig'>$nome</b>
                </div>
            ";

            if($textLines == 3){
            echo "<script>
            $('#contaIdData').css({'top':'78%'}); 
            </script>";

            }else if($textLines == 2){
            echo "<script>
            $('#contaIdData').css({'top':'80%'});
            </script>";
            }else{
            echo "<script>
            $('#contaIdData').css({'top':'82%'});
            </script>";
            }
        
        ?>

        <a onclick="window.location='../index.php?d=true'" id='deslogar'><b>Sair</b></a>
        </span>
        <!-------------------------------------------------------->

    </div>

</div>


<script>
    
    $.getScript("js/configBar.js");

</script>