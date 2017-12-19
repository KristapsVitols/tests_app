<?php
session_start();

//Config file ( database settings )
require_once 'inc/config/config.php';

//Classes
require_once 'inc/classes/Database.php';
require_once 'inc/classes/Test.php';

//Init classes
$test = new Test();