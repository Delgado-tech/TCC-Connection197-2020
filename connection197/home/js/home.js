
	
	var noConvBar = 0;
	var noCookie = 0;
	var chatResize;
	var chatResizeCaracters;
	var barraPesquisaUser;

		
						$(document).ready(function(){
							
							
							$('.conversa').load('chat/ver.php');
							$(".emojiBar").hide();
							$('.conversa').animate({scrollTop: 9999}, 100);
													
						var RefreshId = setInterval(function(){
							
								$('.conversa').load('chat/ver.php');
								
							
								var input = $('#search').val();
								//var inputArray = input.split('#');
					
								//$('.left').load('findUser/resultadoBusca.php?nome='+ inputArray[0]+'&&tag='+inputArray[1]);		
								//$('.bar_side_left').load('findUser/recentConvBar.php');
								
								
//----------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------
								barraPesquisaUser = $("#pesquisar_usuarios").val();
								var barraPesquisaUserArray = barraPesquisaUser.split('#');
								$(".iconeChat").load('findUser/pesquisarConversa.php?nomePU='+barraPesquisaUserArray[0]+'&&tagPU='+barraPesquisaUserArray[1]);
								//PU = Pesquisar User



//----------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------							
//----------------------------------------------------------------------------------------------------------------------------------------------
								if(noCookie == 1){window.location.href = "index.php";}
								
					
						if($(window).width() >= 1200){
							chatResize = 0;
							chatResizeCaracters = 0;
						}
						
						if($(window).width() >= 650 && $(window).width() < 1200){
							chatResize = 3; 
							chatResizeCaracters = -2;
						}
						
						if($(window).width() >= 0 && $(window).width() < 650 ){
							chatResize = 16;
							chatResizeCaracters = 2;
						}
//----------------------------------------------------------------------------------------------------------------------------------------------						
						

		
						
//---------------------------------------------------------------------------------------------------------------------					
//------------------------------------------------AUTO RESIZE-----------------------------------------------------			
//---------------------------------------------------------------------------------------------------------------------									
							
							
								var digitarMsgHeight = $(".digitarMenssagem").css("height");
								var digitarMsgHeightN = parseInt(digitarMsgHeight.replace(/\D/g, ""));
								var digitarMsgHeightM = digitarMsgHeight.replace(/[0-9]/g, "");

								if($("#msg").val().length > (88+chatResizeCaracters)) {
									$("#msg").css({"width":"13%","height": (28*2.4)+ digitarMsgHeightN + digitarMsgHeightM,"overflow-y":"auto"});	
									
									if(open == 0){$(".conversa").css({"height":"24%"});}else{$(".conversa").css({"height":"65%"});}
									
									$(".emojiBar").css({"top":"61.8%"});
								}

								if($("#msg").val().length > (64+chatResizeCaracters) && $("#msg").val().length <= (88+chatResizeCaracters)) {
									$("#msg").css({"width":"12.2%","height": (28*2.4)+ digitarMsgHeightN + digitarMsgHeightM,"overflow-y":"hidden"});	
									
									if(open == 0){$(".conversa").css({"height":"24%"});}else{$(".conversa").css({"height":"65%"});}
									
									$(".emojiBar").css({"top":"61.8%"});
								}
								
								if($("#msg").val().length > (44+chatResizeCaracters) && $("#msg").val().length <= (64+chatResizeCaracters)) {
									$("#msg").css({"width":"12.2%","height": (28*1.8)+ digitarMsgHeightN + digitarMsgHeightM,"overflow-y":"hidden"});	
									
									if(open == 0){$(".conversa").css({"height":"27%"});}else{$(".conversa").css({"height":"68%"});}
									
									$(".emojiBar").css({"top":"63.8%"});
								}

								if($("#msg").val().length > (24+chatResizeCaracters) && $("#msg").val().length <= (44+chatResizeCaracters)) {
									$("#msg").css({"width":"12.2%","height": (28*1.4)+ digitarMsgHeightN + digitarMsgHeightM,"overflow-y":"hidden"});	
									
									if(open == 0){$(".conversa").css({"height":"30%"});}else{$(".conversa").css({"height":"70%"});}
									
									$(".emojiBar").css({"top":"65.6%"});
								}
								
								if($("#msg").val().length <= (24+chatResizeCaracters)){
									$("#msg").css({"width":"12.2%","height":28+ digitarMsgHeightN + digitarMsgHeightM,"overflow-y":"hidden"});	
									
									if(open == 0){$(".conversa").css({"height":"32%"});}else{$(".conversa").css({"height":"70%"});}
									
									$(".emojiBar").css({"top":"66.8%"});

									
								}
								
							
//---------------------------------------------------------------------------------------------------------------------			
//---------------------------------------------------------------------------------------------------------------------			
//---------------------------------------------------------------------------------------------------------------------											
						if($('#Amigos').css('display') == 'block' || $('#ConfigMenu').css('display') == 'block'){
							$('body').css({"overflow":"hidden"});
						}else{
							$('body').css({"overflow":"auto"});
							$('#text-Amigos').css({'border-bottom':'rgba(0,0,0,0.8) 1.5px solid'});
							$('#text-Pedidos').css({'border':'none'});
							$('#add_friend').css({'opacity':'50%','width':'3.5%'});
							nomeAba = 'Amigos';
						}						
					
								
								
						},600);
						$.ajaxSetup({cache:false});
				}); 
				

