	$("#msg").keypress(function (e) {
		if(e.which == 13 && !e.shiftKey) {        
		$(this).closest("form").submit();
		e.preventDefault();
		}
		});



	
	$(".enviar").click(function(){
		enviando(); return false;
	
	});


/*
function closeTip(){
var url = "chat/closeTip.php";

var enviando;
var mensagem = 'true';


enviando = $.post(url, {close:mensagem});
						enviando.done(function(){
						mensagem = '';
							$('.conversa').animate({scrollTop: 9999}, 100);						
							ver();
						});
					
						
}*/

function ver(){
	var url;
	url = 'chat/ver.php';
	jQuery.get(url, function(data){
		$('.conversa').empty().append(data);
	});
	
}


function enviando(){
	var url;
	var mensagem;
	var enviando;


						//hide emoji bar depois de enviar
							open = 1;
							$(".emojiBar").hide();

	url="chat/enviar.php"
	mensagem = $('#msg').val();
	
	var m = $("#msg").val();                                      // instancia uma variavel
				m = mensagem.trim();                             //é removido os espaços extras da var msg
					if(m.length >= 1){                          //controle para enviar apenas mensagens com caracteres
					
						
					
						$("#msg").val(''); 
						
						
						/*var comando = mensagem.split(" ");
//------------------------------------------------------------------------------------------------------------------------COMANDOS-----------------------------
					if( comando[0] === "/cls" ){//limpar Chat
												url='chat/comandos.php';
							
																				if(comando[1] == "-f" || comando[1] == "-F"){
																					if(!(comando[2] > 0) && !(comando[2] < 0)){
																						document.getElementById("msg").placeholder = "[Comando Inválido!]";
																						
																					}else{
																					document.getElementById("msg").placeholder = "[Mensagem Apagada!] ";}
																					
																			}else{
																				document.getElementById("msg").placeholder = "[Chat Limpo 💬]";}
																			
						
										document.getElementById("msg").disabled = true;
										$('#msg').css({"cursor":"none"});
							
						setTimeout(function(){
									$('#msg').css({"cursor":"default"});
									document.getElementById("msg").placeholder = "Digite Aqui";
									document.getElementById("msg").disabled = false;
									
						},2000);
							
					}
//------------------------------------------------------------------------------------------------------------------------COMANDOS-----------------------------							
						*/enviando = $.post(url, {msg:mensagem});
						enviando.done(function(){
						mensagem = '';
							$('#msg').focus();
							$('.chat').animate({scrollTop: $('.chat').prop("scrollHeight")});
							ver();
							
						});			
						
						
					}
}
















