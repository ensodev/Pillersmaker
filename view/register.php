<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php  
    // disallowing registration
        // require_once __DIR__ . '/../view/header3.php';
        // echo "<div class='container mt-4 text-center'>
        //     <div class='alert alert-warning'>
        //         New members registration on this site will commence in two weeks, Thank you. 
        //         <a href='/view/layout.php'>Back to Home Page</a>
        //     </div>
        // </div>
        // ";
        // exit();
 
// end
    
    require_once __DIR__ . '/header.php';
    //require_once __DIR__ . '/../controller/checkSessionContol.php';
?>

</div>

<script>
    title='Register';
    titleTag(title);  
</script>
 
<!-- check if already logged in -->
<?php //checkSession();?></div>

<div class="container">


           

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-4 mt-3">
        
   
            <div class='card w3-green mt-3'>
            
           
           
            <h3 class="text-center w3-text-white mb-3 mt-3">Register</h3>
            <hr>
            <?php require_once __DIR__ . '/../advert/sirpheranmi.php';?>
            <form action="../model/registerModel.php" method="POST" class='p-4'>

                <div class="form">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>


                <div class="form mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                </div>

                  <div class="form mt-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form mt-3 mb-3">
                    <input type="submit" class="btn w3-amber form-control mb-1"  name="submit" value="Register">
                </div>
                                
                
            </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
