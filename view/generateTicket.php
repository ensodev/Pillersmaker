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

// if(isset($_GET['s']) || $_GET['s'] == 1){
//     echo "
//       <div class='container alert alert-success'>
//           Ticket generated,
//       </div>
    
//     ";
// }
$user_id = $_SESSION['USER_ID'];
$PresentTime = date('U');

//it the time_expired is greater than now the ticket is still valid
$sql ="SELECT * FROM `paymentticket` WHERE  user_id =:user_id AND time_expired > $PresentTime AND status = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultValidTicket = $stmt->fetch();

if(isset($resultValidTicket) AND $resultValidTicket != false){
   
    echo "
       <div class='container alert alert-success text-center'>
        You have an active ticket please make payment or delete ticket from your board
       </div>    
     ";
    
    exit();
}


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
    title='pillersmaker | Generate ticket for payment';
    titleTag(title); 
</script>

   
    <!-- header end -->


<div class="container mb-3">
  <div class="text-center mt-3 w3-text-white">
    <h3></h3>
  </div>
  <div class="row text-center">

    <div class="col-md-2 mt-3" id="">
    </div>

        

    <div class="col-md-8 mt-3 w3-green p-3 text-right " id="styles">
      <h5 class=" w3-text-white">
      <span class=" w3-text-amber">OOO</span>Payment Ticket</h5>
      
      
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
      
      <!-- entertainment start -->
      
      <!-- Fashion and style start -->
     <div class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
     
     
     <div class="mt-3 mb-2  mr-3">
   
      </div>
      </div>

      <div>
      <div class="w3-text-gray w3-white p-3 w3-card-4 text-center">

      <p></p>

      <form action='/../model/generateTicketProcess.php' method='post'>
        <div>
            <input type="number" id='amount' name='amount' placeholder='1000-500000' min='1000' max='500000' class="form-control">        
        </div>
        <br>
        <div>
            <textarea id='description' name='description'  class="form-control"> Description </textarea>      
        </div>
        
        <br>
         <div>
           <input type="submit" name="submit" value="Ticket" class="form-control btn btn-warning">   
         </div>
            
           
      </form

      


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
</div>

<?php
require_once __DIR__ . '/../view/testimony.php';

require_once __DIR__ . '/../view/footer.php';
