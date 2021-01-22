<?php if(!isset($_SESSION))
{
session_start();
}
?>
 
<?php require_once __DIR__ . '/../controller/checkSessionContol.php';?>
<?php checkNotSession(); ?>
<?php require_once __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php

 require_once __DIR__ . '/../SetPath.php';
// this GET is coming from connect click button
if(!$_GET){
    
  }else{

    if (!isset($_GET['connection'])){
        echo "<script>location.href='/view/noPage.html'</script>";
        //header("Location: $basePath/view/noPage.html");
        exit();
    }

    if (!isset($_GET['id'])){
        
        echo "<script>location.href='/view/noPage.html'</script>";
        //header("Location: $basePath/view/noPage.html");
        exit();
    }

    if ($_GET['connection'] =="connect"){

        echo "<div class='container mt-5 text-center'><div class='alert alert-success'>
                Connection Request sent..!!
              </div> </div>";
    }

    if ($_GET['connection'] == "friends"){

        echo "<div class='container mt-5 text-center'><div class='alert alert-info'>
                User is your friends..!!
              </div></div>";

    }


    if ($_GET['connection'] == "before"){

        echo "<div class='container mt-5 text-center'><div class='alert alert-danger'>
                Connection Request already sent before..!!
              </div></div>";

    }

    if ($_GET['connection'] == "self"){

        echo "<div class='container mt-5 text-center'><div class='alert alert-danger'>
                Connection to self error..!!
              </div></div>";

    }

    if ($_GET['connection'] =="error"){

        echo "<div class='container mt-5 text-center'><div class='alert alert-error'>
                An error occur kindly contact admin..!!
              </div></div>";

    }

    if (!$_GET['connection']){

    }   

  }
?>

<script>
    title='Search User Profile';
    titleTag(title);  
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
    font-size:12px;
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
    font-size:13px;
}

</style>



<!-- <?php
//  if($result){
?>  -->
<!-- -->

</div>

 

<div class="text-center">
    
    <div class="row mt-1 text-center">
        <div class="col-md-1">
            
        </div>
         
        <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-2 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> PROFILE SEARCH</span></h5>

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

                <?php require_once __DIR__ . '/../advert/advert1.php';?>

                <form action="/model/searchProfileProcess.php" method="POST" class= 'form'>
                    <div class='container ml-2 mr-2'>
                    <div>
                         <input type="text" name="name" placeholder="Username/E-mail" class="form-control">   
                    </div>
                    <br>

                    <div>
                        <input type="submit" name="submit" value="Submit" class="form-control btn btn-warning">   
                    </div>
</div>
                </form>
            </div>
            <hr>
            
            <?php require_once __DIR__ . '/../advert/sirpheranmi.php';?>
        </div>
        
        <div class="col-md-1"></div>
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
