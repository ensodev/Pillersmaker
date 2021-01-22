
<?php require_once __DIR__ . '/header.php';?>
<?php require_once __DIR__ . '/../controller/checkSessionContol.php';?>
<?php require_once  __DIR__ . '/../model/maintainanceMode.php'; ?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
</div>

<?php 
    checkSession();
?> 

<script>
    title='Login';
    titleTag(title);  
</script>

<div class="container ">
   
    

    <div class="row text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 w3-green mt-4 mb-4 pt-3 pb-3 m-3 p-3" style="border-radius:2px">
        <h3 class="text-center w3-text-white">Login</h3>
        <hr>
        <?php require_once __DIR__ . '/../advert/advert1.php';?>
        
            <form action="../model/loginModel.php" method="POST">

                <div class="form">
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>


                <div class="form mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>


                <!-- <div class="form mt-3 text-center">
                    <input type="checkbox" name="remember" value="remember">
                     <span class="w3-text-white text-center">Remember Me</span>                    
                </div> -->


                <div class="form mt-3">
                    <button type="submit" value="submit" name="submit" class="btn w3-amber form-control mb-1">Login</button>                    
                </div>
                                
                <div class="w3-text-white text-center">
                        <a id="read" href="resetPassword.php" class="w3-text-white">Forget Password?</a> 
                        
                </div>

                
                <div class="w3-text-white text-center">
                        <a id="read" href="register.php" class="w3-text-white btn btn-link">Register</a>
                        
                </div>




            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php require_once __DIR__ .'/testimony.php';?>
<?php require_once __DIR__ .'/footer.php';?>
