$('#configIcon').on('click',function(){
        
    $('#ConfigMenu').css({'display':'block'});
    $('#ConfigMenuData').animate({left:'75%'});
    $('#contentConfigTarget').css({'display':'none'}); 
    $('#contentConfig').show();

});


$("#ConfigMenu").on("click",function(e){
   
    if(e.target.id == "ConfigMenu" || e.target.id == "configIcon"){
        
        $('#ConfigMenuData').animate({left:'100%'},{
            complete:function(){
                $('#ConfigMenu').css({'display':'none'});}});
                setTimeout(function(){location.reload();},510);
    }
    
});


$('#ConfigInfoAbaImg').on('click',function(){
    $('#ConfigMenuData').animate({left:'75%'});
    $('#contentConfig').show();
    $('#contentConfigTarget').css({'display':'none'}); 
});

function itemConfig(type){
    $('#contentConfig').hide();
   // setInterval(function(){
    $("#contentConfigTarget").load('configBar/configMenu.php?line='+type);
   // },400);
    $('#ConfigMenuData').animate({left:'60%'},{complete:function(){
       $('#contentConfigTarget').css({'display':'block'}); 
      
 }});

}

