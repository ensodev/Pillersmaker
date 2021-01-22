<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php

if(!isset($_GET['email']) || $_GET['email'] == '' || $_GET['email'] == NULL || $_GET['email'] == 'false'){
   echo 'same reason you got ban';
   exit();
}else{
     $email = $_GET['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillermaker ban account</title>
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../script/title.js"></script>


</head>

<body>

<script>
    title='Pillermaker Banned  account';
    titleTag(title); 
</script>

<div class="container text-center pt-5 w3-text-white">
    <h1>Account Banned </h1>
    <h1>[]</h1>
    <p>Contact our<a href='mailto:customerCare@pillersmaker.com.ng'> Customer Care</a> for more details on this Account Baning and Ban lifting.</p>
    <p>Go through our legal page to see reasons users account could be ban on this platform and how best to get your account reactivated</p>
    <p></p>
    <p>You might want to see your ban details by following this link <a href="bandetails.php?email=<?php echo $email ;?>">Ban Details</a></p>
    <a class="btn btn-link w3-text-amber" href="layout.php">Back Home</a>
</div>
</body>
