<?php
session_start();
if(isset($_SESSION['errorCadastro'])){$errorCadastro = 1;}else{$errorCadastro = 0;}
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
	<title>Connection - Cadastrar</title>
	<link rel="icon" href="icons/iconLogo.png">
</head>
<body>
<?php if(!isset($_GET['v'])){ ?>
	<div class="container" style='height: 90%'>
	
<?php

    
		if($errorCadastro == 1){
	    echo "<p style='color:red;margin-top:26%;'>".$_SESSION["errorCadastro"]."</p>";
        }

        if(!isset($_GET['error'])){
            if(isset($_SESSION['errorCadastro'])){unset($_SESSION['errorCadastro']);}
        }
?>


	<h1 style='margin-top: -5%'>Cadastrar</h1>



	<form action="CadVal.php" method="POST" style='margin-top: -10%'>
          <div class="tbox">
			
			<input type="text" placeholder="Nome de usuário" id="nome" name="nome" autocomplete="off" spellcheck="false" maxlength="50" required>
		</div>
        <div class="tbox">
			
			<input type="text" placeholder="Data de Nascimento" id="dataNascimento" name="dataNascimento" autocomplete="off" spellcheck="false" maxlength="50" required>
		</div>







        <br><br>
		<div class="tbox">
			
			<input type="text" placeholder="Email" id="email" name="email" autocomplete="off" spellcheck="false" maxlength="60" required>
		</div>

		<div class="tbox" >
			
			<input type="password" placeholder="Senha" id="senha" name="senha" maxlength="16" required>	
		</div>	
    
        <div class="tbox">
			
			<input type="password" placeholder="Confirmar senha" id="senhaC" name="senhaC" autocomplete="off" spellcheck="false" maxlength="16" required>
		</div>
		
		<a href="html/home.html"><input type="submit" class="btn"></a>
	</form>

	<a id='linkNC' href='index.php' style='top: 90%; left: 40%'>Fazer Login</a>

</div>

</body>
</html>

<script>

$(document).ready(function(){
  $('#dataNascimento').mask('##/##/9999');
});

</script>

<?php
}else{

    if($errorCadastro == 1){
	    echo "<p style='color:red;margin-top:6%; margin-left:41%; font-size: 1.3vw'>".$_SESSION["errorCadastro"]."</p>";
        }

        if(!isset($_GET['error'])){
            if(isset($_SESSION['errorCadastro'])){unset($_SESSION['errorCadastro']);}
        }

    ?>
    <div class="container" style='height:7 0%'>
    <p id='title' style='left:20%'>Validação de Email</p>
	<p style='position: absolute; top: 25%; padding: 0% 5%;'>Enviamos para seu email um código de verificação, utilize-o aqui para terminar seu cadastro</p>
	<form action="accountValidate.php" method="POST" >
		<div class="tbox">
			<input type="text" style='margin-top:20%; font-family: Bahnschrift;font-size: 1.5vw' placeholder="######" id="idValidation" name="idValidation" autocomplete="off" spellcheck="false" maxlength="6" required>
		</div>
		<a href="html/home.html"><input type="submit" value='Enviar' class="btn"></a>
	</form>
    </div>
<?php
}
?>