<?php

  
function dailystatictic($table){

    require __DIR__ . '/connection.php';

    $tablee = $table;

    $varab = date('U');
    $varab = date('y m d', $varab);

    //close all space
    $rap = array(' ');
    $rep = '';
    $dater = str_replace($rap, $rep, $varab);

    //search for date, if found update login counter else insert day and update by 1 (oneLoger)
    $sql = "SELECT * FROM $tablee WHERE datetime =:dater";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['dater'=>$dater]);
    $result = $stmt->fetch();
    //var_dump($result);



    if($result == false  || !isset($result) ){
        $oneLoger = 1;

        $sql = "INSERT INTO $tablee (datetime, counter)  
        VALUE(:dater, :oneLoger)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['dater'=>$dater, 'oneLoger'=>$oneLoger]);
       
    }

    if(isset($result->counter)){    

        $counter = $result->counter ;
        $counter = $counter + 1;
        $sql = "UPDATE $tablee SET counter =:counter WHERE datetime =:dater";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['counter'=>$counter, 'dater'=>$dater]);

    }


}