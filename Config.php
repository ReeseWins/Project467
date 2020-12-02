<?php
$user = 'z1808886';
$pass = '1995Sep20';
$host = 'courses';
$db = 'z1808886';
try{
  $dsn = "mysql:host=$host;dbname=$db";
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOexception $e){
  echo "Connection failed: " . $e->getMessage();
}
