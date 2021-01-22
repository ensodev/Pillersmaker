<?php

$omolade = 1;
$temi = 2;
$marriage;
$mark = 1;

echo $mark;

//Printer();
Printer3();

function Printer(){
    global $marriage;
    global $omolade;
    global $temi;

    $marriage = $omolade + $temi;
    echo $marriage . "<br>";
}

function Printer2(){

    $marriage = $omolade + $temi;
    echo $marriage;

}


function Printer3(){

    if(isset($omolade)){
       global $mark;
       $mark = 20;
       echo $mark;

    }else{
       global $mark;
       $mark = 30;
       echo $mark;

    }
}

echo $mark;
