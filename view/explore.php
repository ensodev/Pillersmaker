<?php
session_start();
?>
<?php
  //require_once __DIR__ . '/../controller/checkSessionContol.php';
  //checkNotSession();
  // require_once __DIR__ . '/../model/sessionExpire.php';
  // require_once __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/header3.php';
  require_once __DIR__ . '/../model/dailyPageView.php';
  
  if(isset($_GET)){
    
    if(isset($_GET['votesucess']) AND $_GET['votesucess'] == 'yes'){
      echo "
      <div class='container text-center mt-3'>
          <div class='alert alert-success'>
            Thank you for voting for this candidate..!
          </div>
      </div>
      ";
    } 
    
      if(isset($_GET['votesucess']) AND $_GET['votesucess'] == 'errorname'){
        echo "
        <div class='container text-center mt-3'>
            <div class='alert alert-success'>
              Check candidate username and try again or contact customer care..!
            </div>
        </div>
        ";
    }

    
    if(isset($_GET['appliedsucess']) AND $_GET['appliedsucess'] == 'yes'){
      echo "
      <div class='container text-center mt-3'>
          <div class='alert alert-success'>
            Your application have been received and processing started..!
          </div>
      </div>
      ";
    }

        
    if(isset($_GET['appliedsucess']) AND $_GET['appliedsucess'] == 'error'){
      echo "
      <div class='container text-center mt-3'>
          <div class='alert alert-danger'>
            Something just went wrong with your application pls contact customer care..!
          </div>
      </div>
      ";
      }

      if(isset($_GET['appliedsucess']) AND $_GET['appliedsucess'] == 'errorBal'){
        echo "
        <div class='container text-center mt-3'>
            <div class='alert alert-danger'>
              Please makesure you have more than the application amount in you pvc..!
            </div>
        </div>
        ";
      }

        if(isset($_GET['appliedsucess']) AND $_GET['appliedsucess'] == 'errorReceiver'){
          echo "
          <div class='container text-center mt-3'>
              <div class='alert alert-danger'>
              Please makesure you have more than the application amount in you pvc...!
              </div>
          </div>
          ";
        }
  
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
  color:white;
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
    title='Explore';
    titleTag(title); 
</script>

   
    <!-- header end -->


<div class="container mb-3">
  <div class="text-center mt-2 w3-text-white">
    <h3></h3>
  </div>
  <div class="row text-center">

    <div class="col-md-1 mt-3" id="">
    </div>

    

    <div class="col-md-10 mt-3 w3-green p-3 text-right" id="styles">
      <h3><span class=" w3-text-amber">OOO</span> Talents Board</h1>
      
      
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
      <h3 class=" w3-text-red w3-green p-2 w3-card-4" id="rady">
        
      <div class="mt-3 mb-2">
        <hr />
        <?php require_once __DIR__ . '/../advert/advert1.php';?>
        <a href="/mustread/mustRead.php" class="btn btn-success" style="border-color: red">Important Click</a>
      </div>
      </h3>

      <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
         
      <div class="mt-3 mb-2">
       
        <hr>
        <div class="row">
          <div class="col-md-4 text-left">
            <img src='../sitepic/entertainment.jpg' style="width:250px; border-radius:5px">
          </div>
          
          <div class="col-md-8 text-left">
          <h3 class="text-success"><span class=" w3-text-amber">O</span> Entertainment<h3>
          <p class="w3-text-red p-2" style="border:1px green solid; font-size:12px">Musicans | Rappers | Comedians | Actors | Dancers </p>
            <hr>
          <p style='line-height:17px; font-size:14px; font-weight:normal'>
          </p>
          <hr>
          <hr>
          <a href="/entertainment/generalAwards.php" class="btn btn-success" style="border-color: white">Awards</a>

          <a href="/entertainment/entertainmentPost.php" class="btn btn-success" style="border-color: white">Posts</a>

          <!-- <a href="/entertainment/generalEvents.php" class="btn btn-success" style="border-color: white">Events</a> -->

          <a href="/view/future.php" class="btn btn-success" style="border-color: white">Jobs</a>

          <a href="/view/future.php" class="btn btn-success" style="border-color: white">Shop</a>
          
          </div>
        </div>
        
        
      </div>
      </h3>
      
      <!-- leadership start -->
      <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
         
         <div class="mt-3 mb-2">
          
           <hr>
           <div class="row">
             <div class="col-md-4 text-left">
               <img src='../sitepic/leadership1.jpg' style="width:250px; height:215px; border-radius:5px">
             </div>
            
             <div class="col-md-8 text-left">
             <h3 class="text-success"><span class=" w3-text-amber">O</span> Leadership<h3>
             <p class="w3-text-red p-2" style="border:1px green solid; font-size:12px">Motivational Speakers | Motivational Writers</p>
               <hr>
             <p style='line-height:17px; font-size:14px; font-weight:normal'>
             </p>
             <hr>
             <hr>

             <a href="/leadership/generalAwards.php" class="btn btn-success" style="border-color: white">Awards</a>

             <a href="/leadership/leadershipPost.php" class="btn btn-success" style="border-color: white">Posts</a>

              <!-- <a href="/leadership/generalEvents.php" class="btn btn-success" style="border-color: white">Events</a> -->

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Jobs</a>

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Shop</a>
             
             </div>
           </div>
           
           
         </div>
         </h3>
      
     
     <!-- Art/Graphics start -->
     <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
         
         <div class="mt-3 mb-2">
          
           <hr>
           <div class="row">
             <div class="col-md-4 text-left">
               <img src='../sitepic/art1.jpg' style="width:250px; height:215px; border-radius:5px">
             </div>
            
             <div class="col-md-8 text-left">
             <h3 class="text-success"><span class=" w3-text-amber">O</span> Art/Graphics<h3>
             <p class="w3-text-red p-2" style="border:1px green solid; font-size:12px">Graphic Designers | Photographers | Fine Artists </p>
             <hr>
              <p style='line-height:17px; font-size:14px; font-weight:normal'>
              </p>
             <hr>
             <hr>
             <a href="/art/generalAwards.php" class="btn btn-success" style="border-color: white">Awards</a>

             <a href="/art/artPost.php" class="btn btn-success" style="border-color: white">Posts</a>

              <!-- <a href="/art/generalEvents.php" class="btn btn-success" style="border-color: white">Events</a> -->

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Jobs</a>

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Shop</a>
             
             </div>
           </div>
           
           
         </div>
         </h3>

      <!-- Technology start -->
     <!-- <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
          Technology
      <div class="mt-3 mb-2">
        <a href="/technology/generalEvents.php" class="btn btn-success" style="border-color: white">Explore</a>
      </div>
      </h3> -->
      
      
      <!-- Fashion and style start -->
      <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
         
         <div class="mt-3 mb-2">
          
           <hr>
           <div class="row">
             <div class="col-md-4 text-left">
               <img src='../sitepic/fashion2.jpg' style="width:250px; height:215px; border-radius:5px">
             </div>
            
             <div class="col-md-8 text-left">
             <h3 class="text-success"><span class=" w3-text-amber">O</span> Fashion and Style<h3>
             <p class="w3-text-red p-2" style="border:1px green solid; font-size:12px">Designers | Beaders | Tailors | Actors | Hair Stylists | Barber | Makeup Artists| Decoration</p>
              <hr>
              <p style='line-height:17px; font-size:14px; font-weight:normal'>
              </p>
             <hr>
             <hr>
             <a href="/fashion/generalAwards.php" class="btn btn-success" style="border-color: white">Awards</a>

             <a href="/fashion/fashionPost.php" class="btn btn-success" style="border-color: white">Posts</a>

              <!-- <a href="/fashion/generalEvents.php" class="btn btn-success" style="border-color: white">Events</a> -->

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Jobs</a>

              <a href="/view/future.php" class="btn btn-success" style="border-color: white">Shop</a>
             
             </div>
           </div>
           
           
         </div>
         </h3>
      
      
    <!-- Startups start -->
    <!-- <h3 class=" w3-text-gray w3-white p-2 w3-card-4" id="rady">
          Startups
      <div class="mt-3 mb-2">
        <a href="/startup/generalEvents.php" class="btn btn-success" style="border-color: white">Explore</a>
      </div>
      </h3> -->
      
      
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

    </div>
    
    <div class="col-md-1 mt-5" id="">

    
    </div>

    
  </div>

</div>

<?php
require_once __DIR__ . '/testimony.php';
require_once __DIR__ . '/footer.php';
