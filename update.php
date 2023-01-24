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

// Maak een select-query


try {
    $sql = "UPDATE kaas
            SET Voornaam = :firstname
                ,Tussenvoegsel = :tussenvoegsel
                ,Achternaam = :lastname
            WHERE Id = :Idd";

$statement = $pdo->prepare($sql);
$statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['tussenvoegsel'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
$result = $statement->fetch(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    $e->getMessage();
}
//Voorbereiden van de query


$sql = "SELECT * FROM kaas
        WHERE Id = :Id";
        
var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <h1>PDO CRUD</h1>

    <form action="update.php" method="post">
        <label for="firstname">Voornaam:</label><br>
            <input type="text" id="firstname" name="firstname" value="<?php echo $result->Voornaam; ?>"><br>

        <label for="infix">Tussenvoegsel:</label><br>
            <input type="text" id="infix" name="tussenvoegsel"><br>

        <label for="lastname">Achternaam:</label><br>
            <input type="text" id="lastname" name="lastname"><br>

            <input type="text">
        
            <input type="submit" value="Verstuur"><br>
    </form>


</body>
</html>