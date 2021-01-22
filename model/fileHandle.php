<?php
/**
 * this file is suppose to handle kyc.php file upload section
 * as function, in order not to repeat the code
 */


// function FileHandle($file){
// if(isset($_POST['submit'])){
//   $file = $file;

//   $fileName = $file['file']['name'];
//   $fileTmpName = $file['file']['tmp_name'];
//   $fileSize = $file['file']['size'];
//   $fileError = $file['file']['error'];
//   $fileType = $file['file']['type'];


//   $fileExt = explode('.', $fileName);
//   $fileActualExt = strtolower(end($fileExt));

//   $allowed = array('jpg', 'jpeg', 'png');

//   if (in_array($fileActualExt, $allowed)){

//       if ($fileError === 0){

//         if ($fileSize < 1000000){
//           $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
//           $fileDestination ='../kycupload/'.$fileNameNew;

//           // moving the file
//           move_uploaded_file($fileTmpName, $fileDestination);
//           return $fileNameNew;
//         }

//     }

//   }
//  }
// }

