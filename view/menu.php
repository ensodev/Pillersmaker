<?php
if(isset($_SESSION['USER_ID'])){
require_once __DIR__ . '/../SetPath.php';
require_once __DIR__ . '/../model/connection.php';

$userID = $_SESSION['USER_ID'];
$sql ="SELECT COUNT(*) FROM messages WHERE reciever_id =:R_id AND msg_mark_read = 0";
$stmt = $pdo->prepare($sql);
$stmt -> execute(['R_id'=>$userID]);
$resultMSG = $stmt->fetchColumn();
}


// $sql = "SELECT * FROM connect_friend WHERE user_id =:user_id and friend_id =:profile_id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['user_id'=>$user_id,'profile_id'=>$profile_id]);
// $resultFriend = $stmt->fetch();


?>
<body>
    <nav class="navbar navbar-expand-md navbar-dark  w3-black">
        <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="../index1.php">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light"                          href="/view/profileSearch.php">Search<span class="sr-only"></span>
                </a>
            </li>

            

            <li class="nav-item">
            <a class="nav-link text-light" href="/view/explore.php">Explore
                <span class="sr-only"></span>
            </a> 
            </li>

            <li class="nav-item">
            <a class="nav-link text-light" href="/view/groupPost.php">Posts
                <span class="sr-only"></span>
            </a> 
            </li>

            <!-- <li class="nav-item">
            <a class="nav-link text-light" href="/view/chatEntertainment.php">Chat
                <span class="sr-only"></span>
            </a> 
            </li> -->


            <!-- <li class="nav-item">
                <a class="nav-link text-light" href="/view/events.php">Events
                    <span class="sr-only"></span>
                </a>
            </li> -->

            <!-- <li class="nav-item">
            <a class="nav-link text-light" href="/view/articles.php">Articles
                    <span class="sr-only"></span>
                </a>
            </li> -->
            
</ul>
<?php
if(isset($_SESSION['USER_ID'])){

    if($resultMSG == 0 || empty($resultMSG)|| $resultMSG==""){
        echo    "<div class='nav-item' >
            <a class='nav-link text-light' href='/view/emailBoard.php'>
            <span class='badge badge-success'>$resultMSG</span>
            Messages</a>
             </div>";
    }else{
        echo    "<div class='nav-item' >
            <a class='nav-link text-light' href='/view/emailBoard.php'>
            <span class='badge badge-danger'>$resultMSG</span>
            Messages</a>
             </div>";
    }
        
    
    echo    "<div class='nav-item' >
            <a class='nav-link text-light' href='../view/services.php'>Services</a>
            
            </div>";
            // Escrow | Job Posting | My Shop

    echo    "<div class='nav-item' >";
    echo    "<a class='nav-link text-light' href='/view/profile.php?user={$_SESSION['USER_NAME']}'>{$_SESSION['USER_NAME']}</a>";
    echo    "</div>";


    echo    "<div class='nav-item' >
            <a class='nav-link text-light' href='../controller/logoutControl.php'>SignOut</a>
            </div>";

}else{
    echo    "<div class='nav-item' >";
    echo    "<a class='nav-link text-light' href='/view/login.php'>Login</a>";
    echo    "</div>";
    echo    "<div class='nav-item' >";
    echo    "<a class='nav-link text-light hover' href='/view/register.php'>Register</a>";
    echo    "</div>";      
}
?>
</div>
</nav>