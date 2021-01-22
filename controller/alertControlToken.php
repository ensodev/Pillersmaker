<?php 
require_once __DIR__ . '/../view/header.php';
    // main Section
?>

    </div>
<?php
try {

    if(isset($_GET['msg']) && isset($_GET['msgColor'])){

        $msg = $_GET['msg'];
        $msgColor = $_GET['msgColor'];

        echo "<div class='m-5'>";
        echo "<div class='alert alert-{$msgColor} text-center'>".$msg."</div>";
        echo "</div>";
        
        unset($_GET['msg']);
        unset($_GET['msgColr']);
    }
    
} catch (Exception $e) {
    
    echo "<div class='p-5 m-5'>";
    echo "<div class='alert alert-info text-center'>".'Something went wrong! try again.'.'<?php echo $e->message() ?>'."</div>";
    echo "</div>";
    
}      
      
?>
<?php
require_once  __DIR__ .'/../view/testimony.php';
   
  
require_once __DIR__ .'/../view/footer.php';
