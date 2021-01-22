<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php
  require_once __DIR__ . '/../controller/checkSessionContol.php';
  checkNotSession();
  require_once __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/../view/header3.php';
  require_once __DIR__ . '/../model/dailyPageView.php';
  // require_once __DIR__ .'/../model/checkBanAccount.php';
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
    title='Services';
    titleTag(title); 
</script>

   
    <!-- header end -->


<div class="container mb-3">
  <div class="text-center mt-3 w3-text-white">
    <h3></h3>
  </div>
  <div class="row text-center">

    <div class="col-md-1 mt-3" id="">
    </div>

        

    <div class="col-md-10 mt-3 w3-green p-3 text-right " id="styles">
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
      
      <!-- entertainment start -->
      
      <!-- Fashion and style start -->
     <div class="w3-text-gray w3-green p-2 w3-card-4" id="rady">
     
     <div class="mt-3 mb-2  mr-3">
          <?php require_once __DIR__ . '/../advert/advert1.php';?>
      </div>
      
      </div>

      <div>
      <div class="w3-text-gray w3-white p-3 w3-card-4 ">

      <br>
      <div class='row'>
        <div class='col-md-6 text-center'>
        <a href='groupPostSales.php' id='linkdeco' >
          <div class='alert alert-success p-2'>
            <h3>Shop</h3>
            <hr>
            <img src='../images/shop2.jpeg' height='100px' weight='100px'>
            <hr>
            <p>You can purchase other users products and services here.</p>
          </div>
          </a>
        </div>

       <div class='col-md-6 text-center'>
          <a href='groupPostJobs.php' id='linkdeco' >
          <div class='alert alert-success p-2'>
              <h3>Jobs</h3>
              <hr>
              <img src='../images/jobs.jpeg' height='100px' weight='100px'>
              <hr>
              <p>Seeking for jobs or freelancing oppurtunity click here.</p>
          </div>
          </a>
        </div>

        

      </div>

        <hr>
        <br>
      <!--  -->

      <div class='row'>
        <div class='col-md-6 text-center'>
          <a href='buyPVC.php' id='linkdeco' >
          <div class='alert alert-success p-2'>
            <h3>Buy PVC</h3>
            <hr>
            <img src='../images/buy_pvc.jpg' height='100px' weight='100px'>
            <hr>
            <p>Buy Pillersmaker PVC here, it's safer and with no charges.</p>
          </div>
          </a>
        </div>

       <div class='col-md-6 text-center'>
        <a href='cashOutPvc.php' id='linkdeco' >
          <div class='alert alert-success p-2'>
              <h3>Cash PVC</h3>
              <hr>
              <img src='../images/cash.jpeg' height='100px' weight='100px'>
              <hr>
              <p>Cash out your PVC here, get you account credited in 15 minute.</p>
            </div>
         </a>
        </div>


      </div>

        <hr>
        <br>
       <!--  -->

      <div class='row'>
        <!-- <div class='col-md-4 text-center'>
          
          <div class='alert alert-success p-2'>
            <h6>Membership Upgrade</h6>
            <hr>
            <img src='../sitepic/art1.jpg' height='100px' weight='100px'>
            <hr>
            <p>Pay your membership upgrade with pvc</p>
          </div>
        </div> -->

       <div class='col-md-6 text-center'>
       <a href='/view/support.php' id='linkdeco' >
        <div class='alert alert-success p-2'>
            <h6>Support / Donation</h6>
            <hr>
            <img src='../images/donation.jpeg' height='100px' weight='100px'>
            <hr>
            <p>Support this community</p>
          </div>
        </a>
        </div>

        <div class='col-md-6 text-center'>
        <a href='advert.php' id='linkdeco' >
          <div class='alert alert-success p-2'>
            <h6>Advertisment</h6>
            <hr>
            <img src='../images/advert2.jpeg' height='100px' weight='100px'>
            <hr>
            <p>Advertisement on this platform is easy</p>
          </div>
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
    
    <div class="col-md-1 mt-5" id="">

    
    </div>

    
  </div>
  
</div>

<?php
require_once __DIR__ . '/../view/testimony.php';
require_once __DIR__ . '/../view/footer.php';
