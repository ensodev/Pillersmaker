<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php
 
require_once ('connection.php');
$user_id = $_SESSION['USER_ID'];
$id = $_GET['id'];
// echo $id;
// exit();
$sql="DELETE FROM `chatentertainment` WHERE id =:id and user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$id, 'user_id'=>$user_id]);

echo "<script>location.href='/view/chatEntertainment.php'</script>";
//header('Location: /view/chatEntertainment.php');