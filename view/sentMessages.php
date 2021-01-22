<?php
require_once  __DIR__ . '/../model/connection.php'; 
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 
require_once __DIR__ . '/../model/dailyPageView.php';



checkNotSession();
require_once  __DIR__ . '/../model/loadSentMsgProcess.php'; 
?>
<script>
    title='Email Board';
    titleTag(title);  
</script>

<style>
.menu{
    padding:5px 15px;
    color:white;
    background-color:green;
    border-right:1px solid brown ;
    margin:3px;
    border-bottom-left-radius:10px;
    text-decoration:none;


}

.menu:hover{
    padding:5px 15px;
    color:white;
    opacity:0.9;
    background-color:green;
    border-right:3px solid brown ;
    cursor:pointer;
   
}

</style>

<div class="container">
    <div class="row text-center pt-4 pb-4">
              
    <div class="col-md-1   text-left"></div>

        
        <div class="col-md-10 text-left w3-green" style="border-radius:2px ">
               
                <div class="mt-2 mb-2 pr-2 text-right">
                   <h5> <span class="w3-text-amber">OOO 
                   </span>
                        <?php echo $resultMSGsnt ; ?>
                        SENT
                    </h5>
                    <div class="text-right">
      <!-- top/Down Short cut menu -->
               <small>
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                
               </small>
            <!-- shortcut menu end -->
      </div>

                    <hr>
                    <?php require_once __DIR__ . '/../advert/sirpheranmi.php';?>
                </div>

                <div class='card mt-3 mb-3'>
                    <div class='card-header'> 
                        <div class="row pt-2 pl-3 text-center">   
                            <a href="compose.php" class="menu "><span class="col-md-2">Compose<span></a>                 
                            <a href="emailBoard.php" class="menu "><span class="col-md-2">Inbox<span></a> 
                            <a href="sentMessages.php" class="menu "><span class="col-md-2">Sent <span></a> 
                            <a href="/model/deleteAllProcess.php" class="menu "><span class="col-md-2">Trash All <span></a> 
                        </div>
                    </div>

                    <?php 
                            // $resultMSG is from menu.php message count
                            if($resultMSGsnt > 19){
                        echo "<div class='container '>
                              <br>
                              <div class='alert alert-danger'>   
                                Please delete some messages in you sent box to allow new messages to show in your inbox...!
                              </div>
                              </div>";
                            }
                        ?>
        
 
<?php 
                
            foreach ($results as $result){
               
                echo" 
                <div class='card-body'>
                <div class='w3-white'>
                    
                    <div class='pl-2' Style='border-bottom:1px solid green'>
                        
                    <span class='w3-text-green p-1'>OOO</span>   
                        <a Style='font-weight:bolder'   href='/model/searchProfileProcess.php?id=                   $result->reciever_id'>{$result->reciever_name}
                        </a>
                    <span>
                        <span><small>"; 
                        
                        echo date("d/m/y G.i:s","$result->msg_time");
                        
                        echo"</small></span>
                    </span>
                     
                    <span>  
                        <a href='/model/senderMsgMarkDelete.php?id={$result->msg_id}' class='w3-text-red '><span '>Delete</span></a>                   
                    </span>
                        <br>
                        <span class='w3-text-green p-1'>OOO</span>      
                        <a href='/model/readEmailProcess.php?id={$result->msg_id}&error=1'>
                            <span>{$result->msg_subject}</span>
                        </a>
                        <br>
                        
                    </div>                              
                </div>
            </div>
               
                ";
              
            }
?>         
                    <div class='card-footer'>
                    </div>
                <div>
            </div>
            
        </div>

        <div class="col-md-1 text-left"></div>
    </div>
</div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
