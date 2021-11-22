<?php

if(isset($_GET['removerFoto'])){
    mysqli_query($conexao,"UPDATE usuario_perfil set perfil_foto='' where email='$email';");
}

?>



<img id='ConfigInfoAbaImg' src='src/icones/user.png'>
<b id='ConfigInfoAbaTxt'>Perfil</b>


        

<?php

$sqlConfigPerfil = mysqli_query($conexao,"SELECT * from usuario,usuario_perfil where usuario.email = '$email'
and usuario_perfil.email = '$email'");

$dadosUser = mysqli_fetch_array($sqlConfigPerfil);

$nome = $dadosUser['nome'];
$tag = $dadosUser['tag'];
$perfil_foto = $dadosUser['perfil_foto'];

$bio = $dadosUser['perfil_bio'];

    if($perfil_foto == null){
        $letraNome = substr($nome,0,1);
        $srcImg = "src/perfil_randColor/".$dadosUser["randColor"].".jpg";
        $removerFoto = '';
    }else{
        $letraNome = '';
        $srcImg = "getImage/getImagePerfil.php?email=$email";
        $removerFoto = 'Remover';
    }


echo "


<form action='configBar/salvarPerfilConfig.php?email=$email&&tag=$tag&&nome=$nome&&bio=$bio' method='POST' enctype='multipart/form-data'>

    <input id='FotoPerfilConfig-fileinput' name='imagem' type='file' accept='image/gif, image/jpeg, image/png' style='display:none'>
    <span id='removerFotoPerfilConfig' onclick='removerFoto()'>$removerFoto</span>

    <label id='mudarFotoPerfilConfig' for='FotoPerfilConfig-fileinput'>
        <img src='$srcImg' alt='' id='fotoPerfilConfig'>
        <span id='letraPerfilConfig'>$letraNome</span>
        <b id='PerfilFotoHoverTxt-Config'>Mudar <br> Avatar</b>
    </label>

    <span id='inputNomeConfigLabel'>Nome de usuário</span>
    <input type='text' name='nome' value='$nome' id='inputNomeConfig' spellcheck='false' autocomplete='off'>
    <span id='inputTagConfig'>#$tag</span>

    <span id='inputBioConfigLabel'>Status/Biografia</span>
    <textarea id='inputBioConfig' placeholder='Escreva uma bela frase de efeito, ou conte um pouco mais sobre você!' 
    maxlength='500' autocomplete='off' name='bio'>$bio</textarea>

    <input type='submit' value='Salvar' id='salvarAlteracoesConfig'>

</form>


";

?>

<script>
      $("#FotoPerfilConfig-fileinput").change(function(e) {
    
    $('#letraPerfilConfig').css({'opacity':'0%'});
    var file = e.originalEvent.srcElement.files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        $('#fotoPerfilConfig').attr('src', reader.result);   
    };

    reader.readAsDataURL(file);


});

    $('#mudarFotoPerfilConfig').mouseover(function(e){
        $('#PerfilFotoHoverTxt-Config').css({'display':'block'});
    });
    $('#mudarFotoPerfilConfig').mouseout(function(e){
       $('#PerfilFotoHoverTxt-Config').css({'display':'none'});
   });

   function removerFoto(){
    $("#contentConfigTarget").load('configBar/configMenu.php?line=Perfil&&removerFoto=true');
   }

</script>