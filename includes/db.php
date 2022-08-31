<?php 


//#### the easiest way to connect to a database ####
// $connection = mysqli_connect('localhost', 'root', '', 'cms');
//connecting to the database, arguments are database url, username, password and which database
//the arguments can be variables or, more secure, constants.

// if ($connection) {
//     echo "we are connected";
// }
//#################


//A good way

//create an array and hold the values
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

//loop through that array assigning constants.
foreach($db as $key => $value) {


    //creating constants through the array.
    define(strtoupper($key), $value);

    }

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$connection) {
        echo "<h1>NOT CONNECTED TO THE DATABASE</h1>";
    }






?>