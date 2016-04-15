 $(document).ready(function(){
        $('.sub-menu').hide();
        $('.menu').click(function(e){
         
         $(this).next(".sub-menu").slideDown('fast').siblings('.sub-menu').slideUp('fast'); 
        })
      });