<?php require_once __DIR__ . '/header.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>


</div>

<script>
    title='Reset Password';
    titleTag(title);  
</script>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-4 mb-4 w3-green pt-3 pb-3 m-3 p-3" style="border-radius:2px; opacity:0.4">
        <h3 class="text-center w3-text-white ">Reset Password</h3>
            <form action="../model/sendPasswordToken.php" method="POST">

                <div class="form mt-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>


                <div class="form mt-3 mb-3">
                    <input type="submit" class="btn w3-amber form-control mb-1"  name="submit" Value="Submit">
                </div>
                                
              

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<!-- <?php require_once __DIR__ . '/footer.php';?> -->
