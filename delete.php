<?php
    echo 'Het meegestuurde Id = ' . $_GET['Id'];

// Voeg de database-gegevens
require('config.php');

// Maak de $dsn oftewel de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    //Maak een nieuw PDO object zodat je verbinding hebt met de mysql database
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}

// Maak een sql-query die het record gaat verwijderen uit de database
$sql = "DELETE FROM kaas
        WHERE Id = :Id;";

// We prepareren de query zodat we de waarde van Id kunnen koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Bind de value aan de placeholder
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:2.5; url=read.php');
} else {
    echo "Het record is niet verwijderd";
}