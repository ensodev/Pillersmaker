<?php
require_once 'connection.php'; 
require_once __DIR__ . '/../view/header2.php';
require_once __DIR__ . '/../controller/checkSessionContol.php'; 


checkNotSession();
?>

<?php
$user_id = $_SESSION['USER_ID'];

$sql="SELECT * FROM messages WHERE reciever_id =:user_id";
$stmt=$pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$result=$stmt->fetchAll();

if(!$result){
  echo "<script>location.href='/view/emailBoard.php?noMsgToDelete=1'</script>";

  //header('location: /view/emailBoard.php?noMsgToDelete=1');
  exit();
}
 


$sql="DELETE FROM messages WHERE reciever_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);

echo "<script>location.href='/view/emailBoard.php?deleted=1'</script>";
exit();
//header('location: /view/emailBoard.php?deleted=1');
?>



