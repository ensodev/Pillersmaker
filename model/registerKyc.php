<?php
/**
 * this file handle all the kyc form submission
 * created on Nov 9th 2019
 * last updated on Nov 10th 2019
 */


session_start();
require_once __DIR__ . '/connection.php';

if(!isset($_POST['submit'])){
    echo 'Please click the submit button';
    exit();
}

// var_dump($_POST);
// exit();
 
//confirm if all file are inputed correctly
    if( !isset($_POST['fullname']) || 
        !isset($_POST['stateoforigin']) ||
        !isset($_POST['localgovernment']) || 
        !isset($_POST['age']) || 
        !isset($_POST['dateofbirth']) || 
        !isset($_POST['maritalstatus']) || 
        !isset($_POST['bankname']) || 
        !isset($_POST['bankaccountnumber']) || 
        !isset($_POST['contactnumber']) || 
        !isset($_POST['altnumber']) || 
        !isset($_POST['residenceaddress']) || 
        !isset($_POST['officeaddress']) || 
        !isset($_POST['CashoutPhrase'])){
     
        $error1 = 1;
        echo "<script>location.href='/view/kyc.php?e=$error1'</script>";
        
        exit();
    }           

    $unwanted =  array(';','$','#', '-', '>', '<','DELETE', 'delete', 'where', 'WHERE');
    $replacement = ' ';
    $post = $_POST;
    $post = str_replace($unwanted, $replacement, $post);
    // var_dump($post);
    // exit();

    

    $user_id = $_SESSION['USER_ID'];

$sql = 'SELECT * FROM `kyctable` WHERE user_id =:user_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultFindId = $stmt->fetch();

if($resultFindId != false){

    $error2 = 2;
    echo "<script>location.href='/view/kyc.php?e=$error2'</script>";
    exit();
}


    $full_name = $post['fullname'];
    $state_of_oringin = $post['stateoforigin'];
    $local_goverment = $post['localgovernment'];
    $age = $post['age'];
    $date_of_birth = $post['dateofbirth'];
    $marital_status = $post['maritalstatus'];
    $bank_account = $post['bankname'];
    $bank_account_number = $post['bankaccountnumber'];
    $contact_number = $post['contactnumber'];
    $alt_contact_number = $post['altnumber'];
    $residence_address = $post['residenceaddress'];
    $office_address = $post['officeaddress'];
    $cash_out_phrase = $post['CashoutPhrase'];

    $file_face_picture;
    $file_idcard;
    $file_both_pictures;
    $file_recent_bill;

    if(isset($_POST['submit'])){
        
        $fileName = $_FILES['facepicture']['name'];
        $fileTmpName = $_FILES['facepicture']['tmp_name'];
        $fileSize = $_FILES['facepicture']['size'];
        $fileError = $_FILES['facepicture']['error'];
        $fileType = $_FILES['facepicture']['type'];
      
      
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed = array('jpg', 'jpeg', 'png');
      
        if (in_array($fileActualExt, $allowed)){
      
            if ($fileError === 0){
      
              if ($fileSize < 1000000){
                $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
                $fileDestination ='../kycupload/'.$fileNameNew;
      
                // moving the file
                move_uploaded_file($fileTmpName, $fileDestination);
                global $file_face_picture;
                $file_face_picture = $fileNameNew;
              }else{
                $ext = 1;
                echo "<script>location.href='/view/kyc.php?ext=$ext2'</script>";
                exit();
              }
      
          }else{
            $ext = 1;
            echo "<script>location.href='/view/kyc.php?ext=$ext1'</script>";
            exit();
        }
        
        }else{
            $ext = 1;
            echo "<script>location.href='/view/kyc.php?ext=$ext'</script>";
            exit();
        }

        $fileName = $_FILES['idcard']['name'];
        $fileTmpName = $_FILES['idcard']['tmp_name'];
        $fileSize = $_FILES['idcard']['size'];
        $fileError = $_FILES['idcard']['error'];
        $fileType = $_FILES['idcard']['type'];
      
      
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed = array('jpg', 'jpeg', 'png');
      
        if (in_array($fileActualExt, $allowed)){
      
            if ($fileError === 0){
      
              if ($fileSize < 1000000){
                $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
                $fileDestination ='../kycupload/'.$fileNameNew;
      
                // moving the file
                move_uploaded_file($fileTmpName, $fileDestination);
                global $file_idcard;
                $file_idcard = $fileNameNew;
              }
      
          }
      
        }



        $fileName = $_FILES['bothpictures']['name'];
        $fileTmpName = $_FILES['bothpictures']['tmp_name'];
        $fileSize = $_FILES['bothpictures']['size'];
        $fileError = $_FILES['bothpictures']['error'];
        $fileType = $_FILES['bothpictures']['type'];
      
      
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed = array('jpg', 'jpeg', 'png');
      
        if (in_array($fileActualExt, $allowed)){
      
            if ($fileError === 0){
      
              if ($fileSize < 1000000){
                $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
                $fileDestination ='../kycupload/'.$fileNameNew;
      
                // moving the file
                move_uploaded_file($fileTmpName, $fileDestination);
                global $file_both_pictures;
                $file_both_pictures = $fileNameNew;
              }
      
          }
      
        }



        $fileName = $_FILES['recentbill']['name'];
        $fileTmpName = $_FILES['recentbill']['tmp_name'];
        $fileSize = $_FILES['recentbill']['size'];
        $fileError = $_FILES['recentbill']['error'];
        $fileType = $_FILES['recentbill']['type'];
      
      
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed = array('jpg', 'jpeg', 'png');
      
        if (in_array($fileActualExt, $allowed)){
      
            if ($fileError === 0){
      
              if ($fileSize < 1000000){
                $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
                $fileDestination ='../kycupload/'.$fileNameNew;
      
                // moving the file
                move_uploaded_file($fileTmpName, $fileDestination);
                global $file_recent_bill;
                $file_recent_bill = $fileNameNew;
              }
      
          }
      
        }




       }
   
$sql = "INSERT INTO `kyctable` (user_id,
    full_name,
    state_of_origin,
    local_government,
    age,
    date_of_birth,
    marital_status,
    bank_name,
    bank_account_number,
    phone_number,
    alternative_phone_number,
    residence_address,
    office_address,
    cash_phrase,
    facepicture,
    idcard,
    bothpicture,
    recentbill
) VALUE(:user_id,
    :full_name,
    :state_of_oringin,
    :local_goverment,
    :age,
    :date_of_birth,
    :marital_status,
    :bank_account,
    :bank_account_number,
    :contact_number,
    :alt_contact_number,
    :residence_address,
    :office_address,
    :cash_out_phrase,
    :file_face_picture,
    :file_idcard,
    :file_both_pictures,
    :file_recent_bill
)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id,
    'full_name'=>$full_name,
    'state_of_oringin'=>$state_of_oringin,
    'local_goverment'=>$local_goverment,
    'age'=>$age,
    'date_of_birth'=>$date_of_birth,
    'marital_status'=>$marital_status,
    'bank_account'=>$bank_account,
    'bank_account_number'=>$bank_account_number,
    'contact_number'=>$contact_number,
    'alt_contact_number'=>$alt_contact_number,
    'residence_address'=>$residence_address,
    'office_address'=>$office_address,
    'cash_out_phrase'=>$cash_out_phrase,
    'file_face_picture'=>$file_face_picture,
    'file_idcard'=>$file_idcard,
    'file_both_pictures'=>$file_both_pictures,
    ':file_recent_bill'=>$file_recent_bill]);

    $success = 1;

    echo "<script>location.href='/view/kyc.php?s=$success'</script>";


