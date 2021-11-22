

<?php
 
include "../conecta.php";

$email = $_GET['email'];
$tag = $_GET['tag'];

$bio = $_POST['bio'];
$nome = $_POST['nome'];
$imagem = $_FILES['imagem'];


$sqlTag = mysqli_query($conexao,"select * from usuario where nome = '$nome' and tag = $tag and email != '$email'");

while(mysqli_num_rows($sqlTag) > 0){

    $tag = rand(1000,9999);
    $sqlTag = mysqli_query($conexao,"select * from usuario where nome = '$nome' and tag = $tag");

}


 
 $imagem["name"] = str_replace(" ","_",$imagem["name"]);
 
 $imgType  = $imagem['type'];
 $imgType = str_replace("image/",".",$imagem["name"]);
 
 $imgSize = $imagem['size'];
 
//print_r($imagem); echo"<br> $imgType <br> $imgSize <br>";

if($imgSize != 0) { 
    $nomeFinal = time();
	//echo "$nomeFinal <br>";
    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal.$imgType)) {
		
	   $limite = 64*pow(10,6); //64MB
	  // echo $limite;
		
		if($imgSize <= $limite){
        $mysqlImg = addslashes(fread(fopen($nomeFinal.$imgType, "r"), $imgSize)); 

        
        mysqli_query($conexao,"UPDATE usuario_perfil set perfil_foto='$mysqlImg',perfil_bio='$bio' where email='$email'");
        mysqli_query($conexao,"UPDATE usuario set nome='$nome',tag=$tag where email='$email'");
 
        unlink($nomeFinal.$imgType);

	
		}
	}
} 
else{ 
    mysqli_query($conexao,"UPDATE usuario_perfil set perfil_bio='$bio' where email='$email'");
    mysqli_query($conexao,"UPDATE usuario set nome='$nome',tag=$tag where email='$email'");
    
}

header("refresh:0;url=../index.php?type=Perfil");

 
?>
