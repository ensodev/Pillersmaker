$(document).ready(function(){
 
        setInterval(function(){
 
        $.ajax({
          url:"/../model/chatEntertainmentLoad.php",
          datatype:"html",
          success: function(Result){
            $('#chattray').html(Result)
          }
        });      

        },1000)
  
 

        $('#form').submit(function(e) {
                
              
          e.preventDefault();

              
          $.ajax({
              url: "/../model/chatEntertainment.php",
              method: "post",
              data: $('form').serialize(),
              dataType: "text"
                    
           });
        });

});
