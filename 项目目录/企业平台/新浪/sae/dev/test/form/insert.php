<?php
$hostname = SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
$dbuser = SAE_MYSQL_USER;
$dbpass = SAE_MYSQL_PASS;
$dbname = SAE_MYSQL_DB;
$con =  mysql_connect($hostname,$dbuser,$dbpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("app_equn", $con);

$sql="INSERT INTO Persons (FirstName, LastName, Age, word)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]','$_POST[word]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>