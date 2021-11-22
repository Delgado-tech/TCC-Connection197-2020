if(sessionStorage.getItem("nomeAba") !== 'undefined'){
var nomeAba = sessionStorage.getItem("nomeAba");
var lastBorder = sessionStorage.getItem("lastBorder");

    if(nomeAba == 'addAmigo'){
        $('#DadosAmigos').load('friendBar/friendData.php?nomeAba='+nomeAba);
        if(lastBorder == 'Pedidos'){
            $('#text-Pedidos').css({'border-bottom':'rgba(0,0,0,0.8) 1.5px solid'});}else{
            $('#text-Amigos').css({'border-bottom':'rgba(0,0,0,0.8) 1.5px solid'});
        }
    }
}else{
var nomeAba = 'Amigos';
}

var addFriendAba = 1;
abaAmigos(nomeAba);



$(document).ready(function(){

var loadAmigos = setInterval(function(){

    if(nomeAba != 'addAmigo' ){
    $('#DadosAmigos').load('friendBar/friendData.php?nomeAba='+nomeAba);
    }     
    
    sessionStorage.setItem("nomeAba", nomeAba);
    if($('#text-Amigos').css('border') == '0px none rgb(0, 0, 0)'){
        sessionStorage.setItem("lastBorder", 'Pedidos');}else{
        sessionStorage.setItem("lastBorder", 'Amigos');}

},600);
$.ajaxSetup({cache:false});
});

    $('#add_friend').on('click',function(){
    $('#DadosAmigos').load('friendBar/friendData.php?nomeAba='+nomeAba);
    });


    


//------------------------------------------------------------------Fechar Modal --------------------------------------------------
$("#Amigos").on("click",function(e){
        
	if(e.target.id == "Amigos" || e.target.id == "closeAmigos"){window.location = '#f';}
	
});
//---------------------------------------------------------------------------------------------------------------------------------		
				



function abaAmigos(Aba){
    if(Aba == 'Amigos'){
        nomeAba = 'Amigos';
        $('#text-Amigos').css({'border-bottom':'rgba(0,0,0,0.8) 1.5px solid'});
        $('#text-Pedidos').css({'border':'none'});
        $('#add_friend').css({'opacity':'50%','width':'3.5%'});
    }else if(Aba == 'Pedidos'){
        nomeAba = 'Pedidos';
        $('#text-Pedidos').css({'border-bottom':'rgba(0,0,0,0.8) 1.5px solid'});
        $('#text-Amigos').css({'border':'none'});
        $('#add_friend').css({'opacity':'50%','width':'3.5%'});
    }else{
        
                            if(addFriendAba == 1){
                            nomeAba = 'addAmigo';
                            addFriendAba --; 
                            $('#add_friend').css({'opacity':'100%','width':'4%'});

                            }else{
                            addFriendAba ++;
                            $('#add_friend').css({'opacity':'50%','width':'3.5%'});
                            
                                if($('#text-Amigos').css('border') == '0px none rgb(0, 0, 0)'){
                                nomeAba = 'Pedidos';}else{nomeAba = 'Amigos';}

                            }
                            
                           
    }
}