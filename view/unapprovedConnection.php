<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once  __DIR__ . '/header3.php';
require_once __DIR__ . '/../model/dailyPageView.php';

  require_once  __DIR__ . '/../model/connection.php';
  require_once  __DIR__ . '/../model/unapprovedConnectionProcess.php';
 
?>


 
<script>
    // title='Profile';
    titleTag('Connection Approval Board');  
</script>

<style>
.center-col{
    float:none !important ; 
    margin: 0 auto; 
}
.menu{
    padding:5px 15px;
    color:white;
    background-color:green;
    border-right:1px solid brown ;
    margin:0px;
    border-bottom-left-radius:10px;

}

.menu:hover{
    padding:5px 15px;
    color:white;
    opacity:0.9;
    background-color:green;
    border-right:3px solid brown ;
    cursor:pointer;
}
.like-menu{
   
    color:black;
    /* margin:5px 5px 5px 0px; */
    background-color:gold;
    border:1px dotted white ;
    border-radius:20px;
    cursor:pointer;
    font-size:15px;
    
}

.connet-menu{
    text-decoration:none;
    padding:5px 15px;
    margin:5px 5px 5px 0px;
    cursor:pointer;
}

.line-h{
    line-height: 0.5px;
}

.line-h-ajusted{
    line-height: 17px;
}


p{
    font-size:15px;
}

</style>

<div class="container text-center">
    
    <div class="row m-3 text-center">
        <div class="col-md-3">
            
        </div>
        
        <div class="col-md-6 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span>Connection Approval Board</span></h5>
                <hr>
            </div>
            <div class="card">
                <div class="card-header w3-green w3-text-white text-center">
              <?php
                
                foreach ($resultConnection as $result){
               
               echo" 
               <div class='card-body'>
               <div class='w3-white'>
                   
                <div class='mt-2 mb-2 pl-2' Style='border-bottom:1px solid green' >
                   
                    <a Style='font-weight:bolder' href='/model/searchProfileProcess.php?id=$result->id'>
                       <img src='/upload/$result->profile_pic' style='width:70px; height:75px; border-radius:5px' class='m-2'>
                    </a>

                    <p><a Style='font-weight:bolder' href='/model/searchProfileProcess.php?id=$result->id'>
                    
                        {$result->user_name}
                    
                      </a>
                    </p>
                </div>  
                   ";
                       
                                              
                    echo "<div class='pb-2'>
                            <span>
                           <a href='/model/disconnectFriend.php?id=$user_id&friend_id=$result->user_id&back=Board'  class='btn btn-danger btn-md'>Reject</a>


                           <a href='/model/approveConnection.php?id=$result->id&back=Board' class='btn btn-warning btn-md'>Approve</a>        
                       </span>
                       
                   <br>
                   
               
                  
               
                    </div>                          
               </div>
           </div>
              ";
             
           }
        
          ?>      
                   

                </div>
            </div>

                
<!-- card body 2 -->
        <div class="col-md-3"></div>
    </div>
</div>


<?php require_once('testimony.php');?>
<?php require_once('footer.php');?>







