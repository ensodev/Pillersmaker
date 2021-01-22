<?php 

if(!isset($_SESSION))
{
session_start();
}
?>

<?php
session_unset();
session_destroy();

echo "<script>location.href='/index1.php'</script>";
//header("Location: ../index1.php");
