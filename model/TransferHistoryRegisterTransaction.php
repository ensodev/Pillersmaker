<?php
// set DSN


function TransferHistoryRegisterTransaction($dateid, $received, $receiver_email, $amount, $mainTransId, $sent, $sender_email, $amountt){
 
  require_once 'connection3.php';

  $sql = "INSERT INTO `view_coin_history` (
    trans_date, 
    transtype, 
    point_email, 
    amount, 
    trans_id) 
    VALUE(
    :trans_date, 
    :transtype, 
    :point_email, 
    :amount, 
    :trans_id)";



  $stmt = $pdo->prepare($sql);
  $stmt->execute(['trans_date'=>$dateid, 
    'transtype'=>$received, 
    'point_email'=>$receiver_email, 
    'amount'=>$amountt, 
    'trans_id'=>$mainTransId]);



//register transaction for receiver into transaction history
  $sql = "INSERT INTO   `view_coin_history` (
    trans_date, 
    transtype, 
    point_email, 
    amount, 
    trans_id) 
    VALUE(
    :trans_date, 
    :transtype, 
    :point_email, 
    :amount, 
    :trans_id)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['trans_date'=>$dateid, 
    'transtype'=>$sent, 
    'point_email'=>$sender_email, 
    'amount'=>$amountt, 
    'trans_id'=>$mainTransId]);



}