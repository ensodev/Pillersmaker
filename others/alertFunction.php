
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/getPath.php');?>
<?php




function msgAlert($msg, $msgColor='info'){

    if($msg == "Already signed in. "){
        echo "<div class='p-5 m-5'>";
        echo "<div class='alert alert-danger text-center'>You already signed in.</div>";
        echo "</div>"; 
        require_once __DIR__ . '/../view/footer.php';
        exit();
    }else{

        echo "<script>location.href='/controller/alertControl.php?msg=$msg&msgColor=$msgColor'</script>";
        //header("Location: $basePath/controller/alertControl.php?msg={$msg}&msgColor={$msgColor}");
    exit();
    }

}


function msgAlertToken($msg, $msgColor='info'){

    echo "<script>location.href='/controller/alertControlToken.php?msg=$msg&msgColor=$msgColor'</script>";
    //header("Location: $basePath/controller/alertControlToken.php?msg={$msg}&msgColor={$msgColor}");

    exit();

}




