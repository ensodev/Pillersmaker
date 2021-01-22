<?php 
//possible start_session also
// remember to check for GET
if(isset($_GET)){
    if(isset($_GET['selector']) && isset($_GET['validator'])){
        $selector=$_GET['selector'];
        $validator=$_GET['validator'];
    }else{
        echo "<script>location.href='/index1.php'</script>";
        //header('Location: ../view/noPage.html');
        exit();
    }
}

//$_GET['msg']="this is a demo message";

if (!ctype_xdigit($selector) || !ctype_xdigit($validator)){
   
    exit();
}



if(!isset($selector) || !isset($validator)){
    require_once __DIR__ ."/../others/alertFunction.php";
    $msg ="Please click the right link from your Email to reset your passwork";
    $msgColor="danger";
    msgAlertToken($msg, $msgColor);
    exit();
}else{

    require_once  __DIR__ . '/../view/header.php';

    //makesure the link is save to be used
    $selector = htmlspecialchars($selector);
    $validator = htmlspecialchars($validator);

    //remove some characters if injected into the link from the user
    


    echo "<div class='container'>
         <div class='row'>
            <div class='col-md-3'>
        </div>
        <div class='col-md-6 w3-green mt-4 mb-4 pt-3 pb-3 m-3 p-3' style='opacity:0.4; border-radius:2px'>
        <h3 class='text-center w3-text-white'>Reset Password</h3>";
        
           
       
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo "<div class='m-5'>";
                echo "<div class='alert alert-danger text-center'>{$msg}</div>";
                echo "</div>";
            }
       

    

     echo"   <form action='processNewPassword.php' method='POST'>
                <input type='hidden' name='validator' value= {$validator} >

                <input type='hidden' name='selector' value={$selector}>

                <div class='form'>
                    <input type='password' name='password' placeholder='New password' class='form-control'>
                </div>
               <br>
                <div class='form'>
                    <input type='password' name='re-password' placeholder='Confirm password' class='form-control'>
                </div>

                <div class='form mt-3'>
                <input type='submit' value='Reset' name='reset' class='btn w3-amber form-control mb-1'>
            </div>
            </form>
        </div>
        <div class='col-md-3'></div>
    </div></div></div>";

    require_once  __DIR__ . '/view/footer.php';

}
