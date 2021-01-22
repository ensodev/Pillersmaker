<?php 
    require_once __DIR__ . '/header.php';
    require_once __DIR__ . '/../controller/checkSessionContol.php';
    checkNotSession();
    require_once  __DIR__ . '/../model/sessionExpire.php';
    require_once __DIR__ . '/../model/dailyPageView.php';
?>
<body>

<script>
    title='Edit Contacts';
    titleTag(title); 
</script>


  
  <div class="">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 w3-green mt-4 mb-4 pt-3 pb-3 m-3 p-3" style="border-radius:2px">
        <h4 class="text-right w3-text-white"><span class="w3-text-amber">OOO </span>EDIT CONTACT</h4>
        <hr>
        
            <form action="../model/editContactsProcess.php" method="POST">
               
                <div>
                    <h5>Contact</h5>
                </div>
                <div class="form mt-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form mt-3">
                    <input type="url" class="form-control" name="website" placeholder="Website" value="https://www.">
                </div>
                <div class="form mt-3">
                    <input type="text" class="form-control" name="mobile" placeholder="Gsm Or Phone Line">
                </div>


                <div class="form mt-3">
                    <button type="submit" value="submit" name="submit" class="btn btn-info w3-amber form-control mb-1">Submit</button>                    
                </div>

               

                                
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

 <!-- quotetwo -->
 <div class="text-center">
        <div class="jumbotron w3-text-white" style="background-image: url(../images/invest3.jpg); border-radius:0; opacity: 0.4;">
            <h2>Hard work without talent is a shame, but talent without hard work is a tragedy</h2>
            <p>By: Robert Half</p>
        </div>
    </div>
<?php
    require_once __DIR__ . '/testimony.php';
    require_once __DIR__ . '/footer.php';
?>
