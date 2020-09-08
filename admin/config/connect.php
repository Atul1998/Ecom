<?php
$connection = mysqli_connect('localhost','root','','ecomphp');
if(!$connection){
     echo"Error: Unable to connect to MySQL." .mysqli_connect().PHP_EOL;
     echo"Debugging Errno:" .mysqli_connect_errno().PHP_EOL;
     echo"Debugging Error:" .mysqli_connect_error().PHP_EOL;
     exit;
}
?>