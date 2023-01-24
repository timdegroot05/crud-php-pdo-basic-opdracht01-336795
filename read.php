<?php
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "Er is een verbinging gemaakt met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

//Maak een select query om de gegevens uit de tabel kaas halen

$sql = "SELECT Id
               ,Voornaam 
               ,Tussenvoegsel
               ,Achternaam
        FROM kaas";

//Bereid de query voor met de method prepare
$statement = $pdo->prepare($sql);

//Voer de query uit
$statement->execute();

//Zet de opgehaalde gegevens in een array van object
$result = $statement->fetchAll(PDO::FETCH_OBJ);
//var_dump($result);
//echo $result[5]->Voornaam

$tableRows = "";

foreach($result as $info) {
    $tableRows .= "<tr>
                        <td>$info->Voornaam</td>
                        <td>$info->Tussenvoegsel</td>
                        <td>$info->Achternaam</td>
                        <td>
                            <a href='delete.php?Id=$info->Id'>
                                <img src='img/b_drop.png' alt='cross'>
                            </a>
                            </td>
                            <td>
                                <a href='update.php?Id=$info->Id'>
                                <img src='img/b_edit.png' alt='pencil'>
                                </a>
                            </td>
                    </tr>";
}
?>
<h3>Persoonsgegevens</h3>
<a href="index.php">
    <input type="button" value="Maak een nieuw record">
</a>
<br><br>
<table border='1'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>

