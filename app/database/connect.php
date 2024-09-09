<?php

$user = "root";
$pass = "root";

// DBと接続
try{
    $pdo = new PDO('mysql:host=localhost;dbname=bbdb', $user, $pass);
    // echo "DBとの接続に成功しました";
}catch(PDOException $error){
    echo $error->getMessage();
}