<?php
require_once  __DIR__ . '/../model/connection.php'; 
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 



checkNotSession();
require_once  __DIR__ . '/../model/loadEmailProcess.php'; 
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

<div class="">
    <div class="row text-center pt-4 pb-4">
              
    <div class="col-md-3   text-left"></div>

        
        <div class="col-md-6 text-left w3-green" style="opacity:0.8; border-radius:2px ">
               
        

                <div class='card mt-3 mb-3'>
                    <div class='card-header'> 
                        <div class="row pt-2 pl-3 text-center">   
                            <a href="compose.php" class="menu "><span class="col-md-2">Compose<span></a>                 
                            <a href="#" class="menu "><span class="col-md-2">Unread<span></a> 
                            <a href="#" class="menu "><span class="col-md-2">Read <span></a>
                            <a href="#" class="menu "><span class="col-md-2">Sent <span></a> 
                            <a href="#" class="menu "><span class="col-md-2">Trash All <span></a> 
                        </div>
                    </div>
        

<?php
            foreach ($results as $result){
                $number = 1;
                echo" 
                <div class='card-body'>
                <div class='w3-white'>
                    
                    <div class='pl-2' Style='border-bottom:1px solid green; font-weight:bolder'>
                        
                        <a href='/model/readEmailProcess.php?id={$result->msg_id}'><span class='w3-text-black'>$number . {$result->msg_subject}</span></a>
                        <span>
                            <a href='/model/markMessageReadProcess.php?id= {$result->msg_id}'class='btn btn-default w3-text-grean btn-sm '><span>Mark Read</span></a>
                            <a href='/model/deleteMessageProcess.php?id={$result->msg_id}' class='btn btn-default w3-text-red btn-sm '><span>Delete</span></a>                   
                        </span>
                    </div>                              
                </div>
            </div>
               
                ";
               $number = $number + 1;  
            }
?>         
                    <div class='card-footer'>
                    </div>
                <div>
            </div>
            
        </div>

        <div class="col-md-3 text-left"></div>
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
