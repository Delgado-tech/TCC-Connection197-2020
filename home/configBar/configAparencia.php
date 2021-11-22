<?php

if(isset($_GET['model'])){
    $model = $_GET['model'];

    mysqli_query($conexao,"UPDATE usuario_configs set estilo_pagina = $model where email='$email';");
    include 'pageStyle.php';
}












$sqlpageStyle = mysqli_query($conexao,"select * from usuario_configs where email = '$email';");
$pageStyle = mysqli_fetch_array($sqlpageStyle);

$numEstilo = $pageStyle['estilo_pagina'];
$estilo = ['','','',''];
$estilo[$numEstilo] = 'border: rgb(200, 159, 247,0.8) 3px solid;';

$estiloInfo = ['','','',''];
$estiloInfo[$numEstilo] = '&nbsp Atual';
?>


<img id='ConfigInfoAbaImg' src='src/icones/edit.png'>
<b id='ConfigInfoAbaTxt'>Aparência</b>

<p id='configAparenciaInfotxt'>
As vezes ficar preso na mesmice de sempre não é
legal, então por que não tenta mudar o seu "look" só um pouquinho hoje?
</p>

<span id='configApareciaModels' title='Full White' onclick='changeApparence(0)' style='
background-color: white;
left: 10%;
<?php echo $estilo[0]; ?>
'><?php echo $estiloInfo[0]; ?></span>

<span id='configApareciaModels' title='Smooth White' onclick='changeApparence(1)' style='
background-color: rgb(230, 230, 230);
left: 26%;
<?php echo $estilo[1]; ?>
'><?php echo $estiloInfo[1]; ?></span>

<span id='configApareciaModels' title='Smooth Black' onclick='changeApparence(2)' style='
background-color: rgb(45, 42, 58);
left: 42%;
<?php echo $estilo[2]; ?>
'><?php echo $estiloInfo[2]; ?></span>

<span id='configApareciaModels' title='Full Black' onclick='changeApparence(3)' style='
background-color: rgb(20, 20, 20);
left: 58%;
<?php echo $estilo[3]; ?>
'><?php echo $estiloInfo[3]; ?></span>

<script>

    function changeApparence(model){
        $("#contentConfigTarget").load('configBar/configMenu.php?line=Aparencia&&model='+model);
    }

</script>