<?php
/**
 * This file will be responsible for storing
 * all login data of pillersmaker.
 * last update 25th october 2019.12
 **/

// require_once __DIR__ . '/connection.php';

$varab = date('U');
$varab = date('y d m', $varab);

//close all space
$rap = array(' ');
$rep = '';
$dater = str_replace($rap, $rep, $varab);

//search for date, if found update login counter else insert day and update by 1 (oneLoger)
$sql = 'SELECT * FROM datalogin WHERE datetime =:dater';
$stmt = $pdo->prepare($sql);
$stmt->execute(['dater'=>$dater]);
$result = $stmt->fetch();
//var_dump($result);



if(!isset($result) || $result == false){
    $oneLoger = 1;

    $sql = "INSERT INTO `datalogin` (datetime, counter)  
    VALUE(:dater, :oneLoger)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['dater'=>$dater, 'oneLoger'=>$oneLoger]);
    echo '1';
}

if(isset($result)){    

    $counter = $result->counter ;
    $counter = $counter + 1;

    echo $counter;
    echo '<br>';
    echo $dater;
    //exit();
    echo '2';
    $sql = "UPDATE `datalogin` SET counter =:counter WHERE datetime =:dater";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['counter'=>$counter, 'dater'=>$dater]);

}

