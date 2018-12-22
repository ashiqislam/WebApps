<?php
/* Database credentials. */
define('DB_SERVER', 'chickiesandpetes-beertracker-mysqldbserver.mysql.database.azure.com');
define('DB_USERNAME', 'mysql@chickiesandpetes-beertracker-mysqldbserver');
define('DB_PASSWORD', 'Beeradmin1');
define('DB_NAME', 'loginregister');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verify Connection
//if($link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))
//{
//	echo "Database Connection Successful!!!";
//}

if($link === false){
    die("ERROR: Could not connect!!! " . mysqli_connect_error());
}
?>