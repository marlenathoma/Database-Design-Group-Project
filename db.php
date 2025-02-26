<?php

$host = 'localhost';       
$dbname = 'events'; 
$username = 'root';        
$password = '';            

try {
    
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8"; // Data Source Name
    $pdo = new PDO($dsn, $username, $password);
    
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    
    
} catch (PDOException $e) {
    
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
