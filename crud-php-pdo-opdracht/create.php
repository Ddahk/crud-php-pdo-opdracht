<?php
include('config/config.php');

$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=latin1";

$pdo = new PDO($dsn, $dbUser, $dbPass);


$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sql = "INSERT INTO Car (Merk
                        ,Model
                        ,Topsnelheid
                        ,Prijs)
        VALUES          (:brand
                        ,:model
                        ,:topspeed
                        ,:price)";


$statement = $pdo->prepare($sql);


$statement->bindValue(':brand', $_POST['brand'], PDO::PARAM_STR);
$statement->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
$statement->bindValue(':topspeed', $_POST['topspeed'], PDO::PARAM_STR);
$statement->bindValue(':price', $_POST['price'], PDO::PARAM_STR);


$statement->execute();

echo "De gegevens zijn opgeslagen in de database";

header('Refresh:2.5; url=read.php');