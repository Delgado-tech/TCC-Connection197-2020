var open = 1;

var emojiCompilation = "\
😀,😁,😂,🤣,😃,😄,😅,😆,😉,😊,😋,😎,😍,😘,😗,😙,😚,🤗,🤔,😐,😑,😶,🙄,😏,😣,😥,😮,🤐,😯,😪,😫,😴,😌,😛,😜,😝,🤤,😒,😓,\
😔,😕,🙃,🤑,😲,☹️,🙁,😖,😞,😟,😤,😢,😭,😦,😧,😨,😩,😬,😰,😱,😳,😵,😡,😠,😷,🤒,🤕,🤢,🤧,😇,🤠,🤥,🤓,🤡,🤩,🤨,🤯,🤪,🤬,🤮,🤫,\
🤭,🧐,😈,👿,😸,😹,😺,😻,😼,😽,😾,😿,🙀,🙅,🙆,🙇,🙋,🙌,🙍,🙎,🙏,👶,👤,👥,💃,👨,👲,👳,👴,👷,💂,💆,👧,👦,👩,👯,\
👱,👵,🚺,👰,👸,🚶,🚷,🚸,👣,💁,👮,🎃,👽,👾,👼,🎎,☠,💀,👻,🎭,💩,👹,🎅,👺,💢,💤";

var emojisArray = emojiCompilation.split(",");



function emoji(){

	
if(open == 1){
	
		$('.conversa').animate({scrollTop: $('.conversa').prop("scrollHeight")});
		$('.emojiBar').animate({scrollTop: 0}, 500);
		$(".emojiBar").show("fast");
		open--;
		
			
			
			for(var i = 0; i < emojisArray.length; i++){
				document.getElementById('emojis').innerHTML += "<a id='emojisA' style='cursor: pointer;' onclick='enviarEmoji("+ i +")'>"+emojisArray[i]+"</a>";
			}
		
		
	
	
	}else{

		$(".emojiBar").hide("slow");
	
		open++;
		document.getElementById('emojis').innerHTML = "";
	}
	
}

function enviarEmoji(emojiId){

				for(var i = 0; i < emojisArray.length; i++){
					if(emojiId == i){
						
						var msg = document.getElementById("msg");
						
						var posicaoInicial = msg.selectionStart;  
						var posicaoFinal = msg.selectionEnd;  
						
						msg.setRangeText(emojisArray[i], posicaoInicial, posicaoFinal);
						msg.selectionStart+=2;  
						msg.focus();
						}
						
				}
	



}