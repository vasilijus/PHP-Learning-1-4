<?php 

session_start();
print "Session Started<br>";

include_once 'config.php';

include_once 'functions.php';

include_once 'dbTmp.php';


// btn enter
$delete__in = 'none';
// btn exit
$delete__out= 'none';
// default icon
$profile__icon = 'default';
// article array
$articles = [];


// Check if directory exists
if( file_exists("$dataDir") ) {
    $dirExists = true;
    // list files
    $listDir = scandir("$dataDir");
}