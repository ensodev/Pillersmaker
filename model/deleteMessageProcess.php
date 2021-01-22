<?php
require_once 'connection.php'; 
require_once '../view/header2.php';
require_once '../controller/checkSessionContol.php'; 

checkNotSession();
?>

<?php
 $msg_id = $_GET['id'];

$user_id = $_SESSION['USER_ID'];

$sql="DELETE  FROM messages WHERE msg_id = :msg_id AND reciever_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['msg_id'=>$msg_id, 'user_id'=>$user_id]);


echo "<script>location.href='/view/emailBoard.php?deleted=1'</script>";
//header('location: /view/emailBoard.php?deleted=1');
?>



