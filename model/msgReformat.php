<?php

//remove tags from messages and replace it with PZtags codes
$replaceString1 = array(';','--', '<script>', '</script>', '^','(',')', '&', '*', '?');
$replaceString2 ="<";
$replaceString3 = ">";
$replaceString4 ="</";
$replaceString5 = "..";
$replaceString6 = "{p";
$replaceString7 = "{h";
$replaceString8 = "p}";
$replaceString9 = "h}";

  

$replaceStringWith1 ="";
$replaceStringWith2 = "PZtag1";
$replaceStringWith3 = "PZtag2";
$replaceStringWith4 = "PZtag3";
$replaceStringWith5 = "PZtag5";
$replaceStringWith6 = "PZtag6";
$replaceStringWith7 = "PZtag7";
$replaceStringWith8 = "PZtag8";
$replaceStringWith9 = "PZtag9";


$msg_message_format = $msg_message;


$msg_message_format = str_replace($replaceString1, $replaceStringWith1, $msg_message_format);
$msg_message_format = str_replace($replaceString2, $replaceStringWith2, $msg_message_format);
$msg_message_format = str_replace($replaceString3, $replaceStringWith3, $msg_message_format);
$msg_message_format = str_replace($replaceString4, $replaceStringWith4, $msg_message_format);

$msg_message_format = str_replace($replaceString5, $replaceStringWith5, $msg_message_format);
$msg_message_format = str_replace($replaceString6, $replaceStringWith6, $msg_message_format);
$msg_message_format = str_replace($replaceString7, $replaceStringWith7, $msg_message_format);
$msg_message_format = str_replace($replaceString8, $replaceStringWith8, $msg_message_format);
$msg_message_format = str_replace($replaceString9, $replaceStringWith9, $msg_message_format);


$msg_message_format = str_replace("\"", "'", $msg_message_format);

$articleMessage = $msg_message_format;
//replace END