<?php
$string1 = "PZtag1";
$string2 = "PZtag2";
$string3 = "PZtag3";
$string5 = "PZtag5";
$string6 = "PZtag6";
$string7 = "PZtag7";
$string8 = "PZtag8";
$string9 = "PZtag9"; 

$stringRepalce1 = "<";
$stringRepalce2 = ">";
$stringRepalce3 = "</";
$stringRepalce5 = "<br>";
$stringRepalce6 = "<p>";
$stringRepalce7 = "<h4>";
$stringRepalce8 = "</p>";
$stringRepalce9 = "</h4>";


$replaceString = str_replace($string5, $stringRepalce5, $replaceString);
$replaceString = str_replace($string6, $stringRepalce6, $replaceString);
$replaceString = str_replace($string7, $stringRepalce7, $replaceString);
$replaceString = str_replace($string8, $stringRepalce8, $replaceString);
$replaceString = str_replace($string9, $stringRepalce9, $replaceString);

$replaceString = str_replace($string1, $stringRepalce1, $replaceString);
$replaceString = str_replace($string2, $stringRepalce2, $replaceString);
$replaceString = str_replace($string3, $stringRepalce3, $replaceString);