<?php

   if(!isset($_SESSION))
  {
  session_start();
  }
  
  require_once __DIR__ . '/../controller/checkSessionContol.php';
  checkNotSession();
  require_once __DIR__ . '/../controller/checkPaidMember.php';
  require_once __DIR__ . '/header3.php';
  require_once __DIR__ . '/../model/groupPostProcess.php';

 
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
    title='Users Posts';
    titleTag(title); 
</script>

   
    <!-- header end -->


<div class="container mb-3">
  <div class="text-center mt-3 w3-text-white">
    <h3></h3>
  </div>
  <div class="row text-center">

    <div class="col-md-2 mt-5" id="">
    </div>

    

    <div class="col-md-8 mt-3 w3-green p-3 text-right " id="styles">
      <h5 class=" w3-text-white">
      <span class=" w3-text-amber">OOO</span>  Recent Posts</h5>
      
      
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


        <a href="/view/groupPost.php?load=Leadership" class="btn btn-success" style="border-color: white">Leadership</a>

        <a href="/view/groupPost.php?load=Art" class="btn btn-success" style="border-color: white">Arts/Graphics</a>

        <a href="/view/groupPost.php?load=Fashion" class="btn btn-success" style="border-color: white">Fashion/Style</a>

        <a href="/view/groupPost.php?load=Entertainment" class="btn btn-success" style="border-color: white">Entertainment</a>

        <a href="/view/groupPost.php?load=Startups" class="btn btn-success" style="border-color: white">Startups</a>

        <a href="/view/groupPost.php?load=Technology" class="btn btn-success" style="border-color: white">Technology</a>
        <hr>
        <span><?php echo $totalPost;?> Posts</span>
        <div >
          <form action='/view/groupPost.php' method='GET'>
            <div class="form">
              <input type='text' name='start' class='mt-2 w3-text-black' placeholder='Search with No'>
              <input type='submit' name='submit' value='Submit' >
            </div>
          </form>
        </div>
      </div>
      </div>

      <div>
      <div class=" w3-text-gray w3-white p-1 w3-card-4" id="rady">
      <?php
      if(isset($_GET['load']))

        foreach ($result as $variable ) {
          echo "
          <div class='alert w3-green text-left p-1 pl-3 mb-3 ml-3 mr-3'>
          <div class='row'>
          <div class='col-md-1'>
            <h6 ><a class='w3-text-white' href='viewPost.php?postid=$variable->id&user_id=$variable->user_id'>
        ";?>
            <img src="/PostMedia/<?php echo $variable->postfile ;?>"
            style="width:45px; height:45px" class="mr-2 mt-3">
        <?php echo"
           </div>
           <div class='col-md-7 mt-2'>
            $variable->topic</a></h6>
          </div>

          <div class='col-md-4 text-right text-dark mt-3'>
            <span class='badge  p-2'
            style='background:white'>$variable->category </badge></span>
            <span class='badge  p-2 '
            style='background:white'>$variable->post_view view </badge></span>
          </div>
          </div>
        </div>
      ";
        }
      ?>

      <?php
      
      if(!isset($_GET['load']))
      
      foreach ($result as $variable ) {
        echo "
          <div class='alert w3-green text-left p-1 pl-3 mb-3 ml-3 mr-3'>
            <div class='row'>
            <div class='col-md-1'>

              <h6 ><a class='w3-text-white' href='viewPost.php?postid=$variable->id&user_id=$variable->user_id'>
          ";?>
              <img src="/PostMedia/<?php echo $variable->postfile ;?>"
              style="width:45px; height:45px border-radius:50px" class="mr-2 mt-2">
             </div>
             
             <div class='col-md-7 mt-2'>
          <?php echo"
              $variable->topic</a></h6>
            </div>

            <div class='col-md-4 text-right text-dark mt-3'>
              <span class='badge  p-2'
              style='background:white'>$variable->category </badge></span>
              
              <span class='badge  p-2 '
              style='background:white'>$variable->post_view view </badge></span>
            </div>
            </div>
           
           
            
            
          </div>
        ";
      }
    ?>


      </div>
      </div>
       
      <div class=" w3-text-gray w3-white p-2 w3-card-4 " id="rady">
      <div class='mr-3'>
          <form action='/view/groupPost.php' method='GET'>
            <div class="form">
              <input type='text' name='start' class='mt-2 w3-text-black' placeholder='Search with No'>
              <input type='submit' name='submit' value='Submit' >
            </div>
          </form>
        </div>
        <hr>
        <a href="/view/groupPost.php?load=Leadership" class="btn btn-success" style="border-color: white">Leadership</a>

<a href="/view/groupPost.php?load=Art" class="btn btn-success" style="border-color: white">Arts/Graphics</a>

<a href="/view/groupPost.php?load=Fashion" class="btn btn-success" style="border-color: white">Fashion/Style</a>

<a href="/view/groupPost.php?load=Entertainment" class="btn btn-success" style="border-color: white">Entertainment</a>

<a href="/view/groupPost.php?load=Startup" class="btn btn-success" style="border-color: white">Startups</a>

<a href="/view/groupPost.php?load=Technology" class="btn btn-success" style="border-color: white">Technology</a>
     <div class="mt-3 mb-2 mr-3 text-right ">
     

      </div>
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
require_once  __DIR__ . '/testimony.php';
require_once __DIR__ . '/footer.php';
