var open = 1;

var emojiCompilation = "\
๐,๐,๐,๐คฃ,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐ค,๐ค,๐,๐,๐ถ,๐,๐,๐ฃ,๐ฅ,๐ฎ,๐ค,๐ฏ,๐ช,๐ซ,๐ด,๐,๐,๐,๐,๐คค,๐,๐,\
๐,๐,๐,๐ค,๐ฒ,โน๏ธ,๐,๐,๐,๐,๐ค,๐ข,๐ญ,๐ฆ,๐ง,๐จ,๐ฉ,๐ฌ,๐ฐ,๐ฑ,๐ณ,๐ต,๐ก,๐ ,๐ท,๐ค,๐ค,๐คข,๐คง,๐,๐ค ,๐คฅ,๐ค,๐คก,๐คฉ,๐คจ,๐คฏ,๐คช,๐คฌ,๐คฎ,๐คซ,\
๐คญ,๐ง,๐,๐ฟ,๐ธ,๐น,๐บ,๐ป,๐ผ,๐ฝ,๐พ,๐ฟ,๐,๐,๐,๐,๐,๐,๐,๐,๐,๐ถ,๐ค,๐ฅ,๐,๐จ,๐ฒ,๐ณ,๐ด,๐ท,๐,๐,๐ง,๐ฆ,๐ฉ,๐ฏ,\
๐ฑ,๐ต,๐บ,๐ฐ,๐ธ,๐ถ,๐ท,๐ธ,๐ฃ,๐,๐ฎ,๐,๐ฝ,๐พ,๐ผ,๐,โ ,๐,๐ป,๐ญ,๐ฉ,๐น,๐,๐บ,๐ข,๐ค";

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