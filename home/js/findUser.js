//-------------------------------------Funcionalidades------------------------------------------------
$('.searchUserFormatation').keypress(function(e){
	var input = $('.searchUserFormatation').val();
	if(input.includes('#')){
		var inputNumbers = input.split('#');
			if(inputNumbers[1].length < 4){
					
						if((e.which>47 && e.which<58)) return true;
						else{
							if (e.which==8 || e.which==0) return true; 
						else  return false;
						}
	
				}else return false;
			}

});












