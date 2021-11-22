<?php

$email = $_COOKIE['email1'];
$sqlpageStyle = mysqli_query($conexao,"select * from usuario_configs where email = '$email';");
$pageStyle = mysqli_fetch_array($sqlpageStyle);

if($pageStyle['estilo_pagina'] == 0){
    
    echo "
    <script>
        document.documentElement.style.setProperty('--invertImg', 'invert(0%)');
        document.documentElement.style.setProperty('--colorBaW', 'black');
        document.documentElement.style.setProperty('--backgroudColor', 'white');
        document.documentElement.style.setProperty('--backgroudColorSmooth', 'white');
    </script>
    ";

}else if($pageStyle['estilo_pagina'] == 1){

    echo "
    <script>
        document.documentElement.style.setProperty('--invertImg', 'invert(0%)');
        document.documentElement.style.setProperty('--colorBaW', 'black');
        document.documentElement.style.setProperty('--backgroudColor', 'rgb(230, 230, 230)');
        document.documentElement.style.setProperty('--backgroudColorSmooth', 'rgb(238, 238, 238)');
    </script>
    ";

}else if($pageStyle['estilo_pagina'] == 2){

    echo "
    <script>
        document.documentElement.style.setProperty('--invertImg', 'invert(80%)');
        document.documentElement.style.setProperty('--colorBaW', 'rgb(235, 231, 231)');
        document.documentElement.style.setProperty('--backgroudColor', 'rgb(34, 32, 43)');
        document.documentElement.style.setProperty('--backgroudColorSmooth', 'rgb(45, 42, 58)');
    </script>
    ";

}else if($pageStyle['estilo_pagina'] == 3){

    echo "
    <script>
        document.documentElement.style.setProperty('--invertImg', 'invert(80%)');
        document.documentElement.style.setProperty('--colorBaW', 'rgb(235, 231, 231)');
        document.documentElement.style.setProperty('--backgroudColor', 'rgb(20, 20, 20)');
        document.documentElement.style.setProperty('--backgroudColorSmooth', 'rgb(20, 20, 20)');
    </script>
    ";

}


?>


