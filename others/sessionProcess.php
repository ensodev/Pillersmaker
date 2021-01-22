<?php

function sessionDie(){
session_unset();
session_destroy();
}