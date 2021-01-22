<?php if(!isset($_SESSION))
{
session_start();
}
?>


<?php
  require_once __DIR__ . '/../controller/checkSessionContol.php';
  checkNotSession();
  // require_once __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/../view/header3.php';
  require_once __DIR__ . '/../model/dailyPageView.php';
?>

<?php
//require_once __DIR__  . '/connection.php';

if(!isset($_SESSION['USER_ID'])){
  
 require_once __DIR__ . '/../view/header3.php';
 echo "<script>location.href='/../controller/logoutControl.php'</script>";
 exit();
}


if(!isset($_GET['s'])){
    echo "<script>location.href='/../controller/logoutControl.php'</script>";
    exit();
}

$supply_id = (int)$_GET['s'];
$user_id = (int)$_SESSION['USER_ID'];

//Iif user id is not the same as user login id then
if($supply_id != $user_id){
    echo "<script>location.href='/../controller/logoutControl.php'</script>";
    exit();
}


$PresentTime = date('U');

$sql ="SELECT * FROM `register` WHERE  id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultUserName = $stmt->fetch();

if(!isset($resultUserName)){
    echo "<script>location.href='/../controller/logoutControl.php'</script>";
    exit();
}


$sql ="SELECT * FROM `paymentticket` WHERE  user_id =:user_id AND time_expired > $PresentTime ORDER BY id DESC ";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultValidTicket = $stmt->fetch();


if(!isset($resultValidTicket) || $resultValidTicket == false){
    echo "
        <div class='alert alert-info text-center'>
            You don't have an active ticket...!
        </div>
    ";
    exit();
}



require_once __DIR__ . '/../model/getSettings.php';
$bank_name;
$bank_account_no;
$account_name;

if(!isset($resultSettings->bank_name) || 
   $resultSettings->bank_name == false || 
        !isset($resultSettings->bank_account_no) ||
        $resultSettings->bank_account_no == false || 
            !isset($resultSettings->account_name) || 
            $resultSettings->account_name == false ){
                global $bank_name;
                global $bank_account_no;
                global $account_name;

                $bank_name = 'Contact Customer Care';
                $bank_account_no = 'Contact Customer Care';
                $account_name =  'Contact Customer Care';

}else{
    global $bank_name;
    global $bank_account_no;
    global $account_name;

    $bank_name = $resultSettings->bank_name;
    $bank_account_no = $resultSettings->bank_account_no;
    $account_name =  $resultSettings->account_name;
}

$sql ="SELECT * FROM payments WHERE  user_id =:user_id AND ticket_id =:ticket_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>trim($_SESSION['USER_ID']), 'ticket_id'=>$resultValidTicket->ticket_id]);
$resultConfirmedDelete = $stmt->fetch();

?>

<style>
#styles{
  border-right: 1px solid yellow;
  
}   

ul{
  padding:0px;
  margin: 0px;
}

#linkdeco{
  text-decoration: none;
}

#llists:hover{
  background-color: green;
  border-radius: 20px;
  padding:1px;
}
#rady{
  border-radius: 5px;
}
</style>

<body>

<script>
    title='Pillersmaker | My Tickets';
    titleTag(title); 
</script>

   
    <!-- header end -->


<div class=" mb-3">
  <div class="text-center mt-3 w3-text-white">
    <h3></h3>
  </div>
  <div class="row text-center">

    <div class="col-md-2 mt-3" id="">
    </div>

        

    <div class="col-md-8 mt-3 w3-green p-3 text-right " id="styles">
      <h5 class=" w3-text-white">
      <span class=" w3-text-amber">OOO</span> Our Services</h5>
      
      
      <!-- <div class="mb-1 mt-2">
        <a href="/mustread/mustRead.php" class="btn btn-danger mb-2" style="border-color: white">Read before you explore</a>
      </div> -->
      <hr>
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
      
     
     <div class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
     
        <div class="mt-3 mb-2  mr-3">
    
        </div>

    </div>

      <div>
      <div class="w3-text-gray w3-white p-3 w3-card-4 ">

      <br>
      <div class='row'>
        <div class='col-md-2 text-center'>
        <a href='groupPostSales.php' id='linkdeco' >
          <!-- <div class='alert alert-success p-2'>
           
          </div> -->
          </a>
        </div>

       <div class='col-md-8 text-center '>
          
          <div class='alert alert-success p-2 m-4'>
              <h5>PILLERSMAKER TICKET</h5>
              
              <hr>
              <div class='text-center m-4 p-4 bg-dark'>
                <h5 class='text-light'>TICKET DETAILS</h5>
                <hr>
                <p><span class='text-danger'>ISSUED TO</span>   
                <br><span class='text-light'><?php echo $resultUserName->user_name; ?></span></p>

                <p><span class='text-danger'>TICKET NO</span>          
                <br><span class='text-light'><?php echo $resultValidTicket->ticket_id; ?></span></p>

                <p><span class='text-danger'>AMOUNT</span>   
                <br><span class='text-light'><?php echo $resultValidTicket->amount; ?></span></p>

                <p><span class='text-danger'>DATE ISSUED</span>        
                <br><span class='text-light'><?php echo date('D-d-M-Y',$resultValidTicket->time_generated); ?></span></p>
                
                <p><span class='text-danger'>EXPIRED DATE</span>      
                <br><span class='text-light'><?php echo date('D-d-M-Y',$resultValidTicket->time_expired); ?></span></p>
                
                <p><span class='text-danger'>TICKET STATUS:</span>             
                <br><span class='text-light'><?php 
                                              if($resultValidTicket->status == 0){
                                               echo 'Not Confirm'; 
                                              }else{
                                                echo " Confirmed 
                                                       <hr>
                                                        <div class='alert alert-success'>
                                                          You can 
                                                          <a href='/../view/generateTicket.php'>generate another ticket </a> for 
                                                          processing now.
                                                          
                                                      </div>
                                                              "; 
                                              }
                                            ?>
                                            
                                            <?php 
                                              if($resultValidTicket->status == 2){
                                               echo "<hr>
                                                    <div class='text-light'>
                                                        Payment Purpose Activated
                                                    </div>"; 
                                              } 
                                            ?>
                                            
                                            </span></p>
              </div>
              <hr>
              <div class='text-center m-4 p-4 bg-dark'>
                <h5 class='text-light'>BANK DETAILS</h5>
                <hr>
                <p><span class='text-danger'>BANK NAME</span>   
                <br><span class='text-light'><?php echo $bank_name; ?></span></p>

                <p><span class='text-danger'>ACCOUNT NO</span>          
                <br><span class='text-light'><?php echo $bank_account_no; ?></span></p>

                <p><span class='text-danger'>ACCOUNT NAME</span>        
                <br><span class='text-light'><?php echo $account_name; ?></span></p>
              </div>
            <?php
                if($resultConfirmedDelete == false){
                    echo "<p><a href='/../model/deleteTicket.php?d=$user_id&ticket=$resultValidTicket->ticket_id'><span class='btn btn-warning'>DELETE TICKET<span></a></p>";
                }
            ?>
          </div>
         
        </div>

        <div class='col-md-2 text-center'>
          <a href='escrow.php' id='linkdeco' >
          <!-- <div class='alert alert-success p-2'>
            
          </div> -->
          </a>
        </div>

      </div>

      </div>
      </div>
       
      <div class=" w3-text-gray w3-white p-2 w3-card-4 " id="rady">
        <div class='mr-3'>
        </div>
        <hr>
      </div>
      <div class="text-right ">
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

    </div>
    
    <div class="col-md-2 mt-5" id="">

    
    </div>

    
  </div>
  
</div>

<?php
require_once __DIR__ . '/../view/testimony.php';
require_once __DIR__ . '/../view/footer.php';
