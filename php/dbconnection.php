<!-- dbconnection.php -->
<?php

$local = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1');

include 'config.php';

if ($local) {
  $dbname = $db_name_local;
  $hostname = $db_hostname_local;
  $DB_USER = $db_user_local;
  $DB_PASSWORD = $db_password_local;
} else {
  $dbname = $db_name_prod;
  $hostname = $db_hostname_prod;
  $DB_USER = $db_user_prod;
  $DB_PASSWORD = $db_password_prod;
}
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

try {
    $dbconn = new PDO("mysql:host=$hostname;dbname=$dbname", $DB_USER, $DB_PASSWORD, $options);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*** echo a message saying we have connected ***/
} catch(PDOException $e){
    // For debug purpose, shows all connection details
    echo 'Connection failed: '.$e->getMessage()."<br />";
      // Hide connection details.
    //echo 'Could not connect to database.<br />'); 
}
?>