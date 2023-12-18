<?php

include('config/config.php');


$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=latin1";


$pdo = new PDO($dsn, $dbUser, $dbPass);


$sql = "SELECT Id 
              ,Merk
              ,Model
              ,Topsnelheid
              ,Prijs
        FROM  Car
        ORDER BY Prijs ASC";


$statement = $pdo->prepare($sql);


$statement->execute();


$result = $statement->fetchAll(PDO::FETCH_OBJ);


$tableRows = "";


foreach ($result as $autoObject) {
    $tableRows .= "<tr>
                        <td>$autoObject->Id</td>
                        <td>$autoObject->Merk</td>
                        <td>$autoObject->Model</td>
                        <td>$autoObject->Topsnelheid</td>
                        <td>$autoObject->Prijs</td>
                        <td>
                             <a href='update.php?id=$autoObject->Id'>
                                <img src='img/b_edit.png' alt='potlood'>
                            </a>

                            <img src='img/b_drop.png' alt='x'>
                        </td>
                  </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Weergave autos</title>
</head>
<body>
    <h3>Autosgegevens</h3>    
    <table>
        <thead>
            <th>Id</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Topsnelheid</th>
            <th>Prijs</th>
        </thead>
        <tbody>
            <?php echo $tableRows; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Invoegen Autosgegevens</a>
</body>
</html>