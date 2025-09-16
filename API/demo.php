<?php 

    $host = 'localhost';
    $dbname = 'cms_digitalnashik';
    $username = 'cms_digitalnashik';
    $password = 'digitalnashik';
    
    
    $mysqli = new mysqli("localhost","cms_digitalnashik","digitalnashik","cms_digitalnashik");
    
    // Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
    echo "connection success";
}
    
?>