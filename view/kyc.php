<?php session_start(); ?>
<?php require_once __DIR__ . '/../model/connection.php'; ?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php

$user_id = $_SESSION['USER_ID'];
$sql = 'SELECT * FROM `kyctable` WHERE user_id =:user_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultFindUser = $stmt->fetch();

if(isset($resultFindUser) AND isset($resultFindUser->approved)){
    if($resultFindUser->approved == 1){
        require_once __DIR__ . '/header3.php';
        echo "
            <div class='container text-center'>
                <div class='alert alert-success'>
                 Your credentials on this platform has been approved..!
                </div>
            </div>
            ";
        exit();
    };

    if(isset($resultFindUser) AND $resultFindUser->approved == 0){
        require_once __DIR__ . '/header3.php';
        echo "
            <div class='container text-center'>
                <div class='alert alert-success'>
                 We are still processing your credentials..!
                </div>
            </div>
            ";
        exit();
    };
};
?>

<?php  
    // disallowing registration
        // require_once __DIR__ . '/../view/header3.php';
        // echo "<div class='container mt-4 text-center'>
        //     <div class='alert alert-warning'>
        //         New members registration on this site will commence in two weeks, Thank you. 
        //         <a href='/view/layout.php'>Back to Home Page</a>
        //     </div>
        // </div>
        // ";
        // exit();
 
// end
    
    require_once __DIR__ . '/header3.php';
    //require_once __DIR__ . '/../controller/checkSessionContol.php';
    if(isset($_GET['s']) AND $_GET['s'] == 1){
        echo "
            <div class='container text-center'>
                <div class='alert alert-success'>
                 Your credentials for pillersmaker kyc is successfully submitted..!
                </div>
            </div>
            ";
    }
    if(isset($_GET['e']) AND $_GET['e'] == 1)
        echo "
            <div class='container text-center'>
                <div class='alert alert-info'>
                All field must be filled please..!
                </div>
            </div>
            ";

    if(isset($_GET['e']) AND $_GET['e'] == 2)
        echo "
             <div class='container text-center'>
                <div class='alert alert-info'>
                We are still processing the credentials you 
                submitted, please keep checking your email for our response
                </div>
              </div>
                    ";
    if(isset($_GET['ext']) AND $_GET['ext'] == 1)
        echo "
        <div class='container text-center'>
            <div class='alert alert-danger'>
                You are trying to upload wrong file type, only jpeg, jpg, png extension 
                are supported
            </div>
        </div>
    ";

    if(isset($_GET['ext1']) AND $_GET['ext1'] == 1)
        echo "
        <div class='container text-center'>
            <div class='alert alert-danger'>
                some went wrong please try again in few 
                minute and try to reduce the size of your 
                file not to be bigger than 300kb
                and must be jpeg, jpg, png extension
            </div>
        </div>
    ";

    if(isset($_GET['ext2']) AND $_GET['ext2'] == 1)
    echo "
    <div class='container text-center'>
        <div class='alert alert-danger'>
           One of your file is bigger than the required size, please reduce the files to be lesser than 301kb
        </div>
    </div>
";
?>

</div>   

<script>
    title='Pillersmaker | KYC infomation board';
    titleTag(title);  
</script>
 
<!-- check if already logged in -->
<?php //checkSession();?></div>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-4 mt-3">
        
            <div class='card w3-green m-3 p-3'>
            <h3 class="text-center w3-text-white mb-3">Member KYC Details</h3>
            <hr>
            <?php require_once __DIR__ . '/../advert/sirpheranmi.php';?>
            <form action="../model/registerKyc.php" method="POST" enctype="multipart/form-data" >

                <div class="form">
                    <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                </div>


                <div class="form mt-3">
                    <input type="text" class="form-control" name="stateoforigin" placeholder="State of Origin">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="localgovernment" placeholder="Local Government">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name='age' placeholder="Your Age">
                    <p></p>
                    <input type="date" class="form-control" name="dateofbirth" placeholder="Date of birth">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="maritalstatus" placeholder="Marital Status">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="bankname" placeholder="Bank Name">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="bankaccountnumber" placeholder="Bank account Number">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="contactnumber" placeholder="Phone number">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="altnumber" placeholder="alternative Phone number">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="residenceaddress" placeholder="Residence Address">
                </div>
                
                <div class="form mt-3">
                    <input type="text" class="form-control" name="officeaddress" placeholder="office address">
                </div>

                <div class="form mt-3">
                    <input type="text" class="form-control" name="CashoutPhrase" placeholder="phrase">
                </div>

                <div class="form mt-3">
                    <label for='facepicture'>Your Face Picture</label><br>
                    <input type="file" class="form-control" name="facepicture" placeholder="Face Picture">
                </div>

                <div class="form mt-3">
                    <label for='idcard'>Your ID card Picture</label><br>
                    <input type="file" class="form-control" name="idcard" placeholder="Id Card Picture">
                </div>

                <div class="form mt-3">
                    <label for='bothpicture'>Picture of id card close to your face</label><br>
                    <input type="file" class="form-control" name="bothpictures" placeholder="Both picture">
                </div>

                <div class="form mt-3">
                    <label for='recentbill'>Picture of recent bill paid</label><br>
                    <input type="file" class="form-control" name="recentbill" placeholder="Recent Bill">
                </div>

                <div class="form mt-3 mb-3">
                    <input type="submit" class="btn w3-amber form-control mb-1"  name="submit" value="Register">
                </div>
                
                                
                
            </form>
            <hr />
            <?php require_once __DIR__ . '/../advert/advert1.php';?>
            </div>
            
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php';?>
