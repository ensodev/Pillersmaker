
<?php
function checkSession(){

        if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])){
                require_once __DIR__ .'/../view/header.php';
                echo "<div class='p-5 m-5'>";
                echo "<div class='alert alert-danger text-center'>You already signed in.</div>";
                echo "</div>"; 
                require_once __DIR__ . '/../view/footer.php';
                exit();
         }
}

function checkNotSession(){

        if(!isset($_SESSION['USER_ID']) || !isset($_SESSION['USER_NAME']) || !$_SESSION){


               
                // $msg = $_SESSION['MSG'];

                if (empty($msg) || !$msg ==""){
                
                require_once __DIR__ . '/../view/header.php';
                 $msg = "Please login to view this page!!! ";
   
                echo "<div class='p-5 m-5'>";
                echo "<div class='alert alert-danger text-center'>Please login to view this page!!! .</div>";
                echo "</div>"; 
                require_once __DIR__ . '/../view/footer.php';
                exit();
                }
         }
}

?>

