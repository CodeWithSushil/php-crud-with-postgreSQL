<?php
$host = "localhost";
$port = 5432;
$user = "root";
$pass = "root";
$db = "myDB";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");

if(!$con){
  echo "Database not connected." . pg_last_error($con);
  pg_close($con);
}
