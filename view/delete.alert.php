<?php 
require_once  __DIR__ . '/header.php';
    // main Section
try {

    if(isset($_GET['msg']) && isset($_GET['msgColor'])){

        $msg = $_GET['msg'];
        $msgColor = $_GET['msgColor'];

        echo "<div class='m-5'>";
        echo "<div class='alert alert-{$msgColor} text-center'>".$msg. "<a href='/view/login.php' class='w3-text-green'>Login</a>"."</div>";
        echo "</div>";
    }
    
} catch (Exception $e) {
    
    echo "<div class='p-5 m-5'>";
    echo "<div class='alert alert-info text-center'>".'Something went wrong! try again.'.'<?php echo $e->message() ?>'."</div>";
    echo "</div>";
    
}      
      
// testimony Section
    require_once __DIR__ . '/testimonySection.php';
   
// footer Section   
    require_once __DIR__ . '/footer.php';


