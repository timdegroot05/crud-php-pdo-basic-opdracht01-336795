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

    <form action="create.php" method="post">
        <label for="firstname">Voornaam:</label><br>
            <input type="text" id="firstname" name="firstname"><br>

        <label for="infix">Tussenvoegsel:</label><br>
            <input type="text" id="infix" name="tussenvoegsel"><br>

        <label for="lastname">Achternaam:</label><br>
            <input type="text" id="lastname" name="lastname"><br>

        
        
            <input type="submit" value="Verstuur"><br>
    </form>


</body>
</html>