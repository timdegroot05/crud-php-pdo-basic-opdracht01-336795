<?php
include('config.php');

//DSN staat voor data sourcename
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "Er is een verbinding met de database";
} catch(PDOException $e) {
    echo "Er is helaas geen verbining met de database.<br>
          Neem contact op met de ADMINISTRATOR";
    echo "Systeemmelding: " . $e->getMessage();
}
// Maak de sql query voor het inserten van een record
$sql = "INSERT INTO kaas (id
                         ,Voornaam 
                         ,Tussenvoegsel
                         ,Achternaam)
        VALUES           (NULL
                         ,:firstname
                         ,:tussenvoegsel
                         ,:lastname);";
// Maak de query gereed met de prepare-method van het $pdo-object
$statement = $pdo->prepare($sql);
$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['tussenvoegsel'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
// Vuur de query af op de database...
$statement->execute();

//Hiermee sturen we automatische door naar de pagina read.php
header('Location: read.php');