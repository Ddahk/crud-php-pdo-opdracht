<?php
    include('config/config.php');

    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=latin1";
    
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
        var_dump($_POST);

        $sql = "UPDATE Car
                SET    Merk = :merk
                      ,Model = :model
                      ,Topsnelheid = :topsnelheid
                      ,Prijs = :prijs
                WHERE Id = :id";
       
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':Merk', ':Model', ':Topsnelheid', ':Prijs');

        exit();
    }

    $sql = "SELECT Id
                   ,Merk
                   ,Model
                   ,Topsnelheid
                   ,Prijs
             FROM  Car
             WHERE  Id = :id";

    $statement = $pdo->prepare($sql);

    
    $statement->bindValue(':brand', $_POST['brand'], PDO::PARAM_STR);
    $statement->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
    $statement->bindValue(':topspeed', $_POST['topspeed'], PDO::PARAM_STR);
    $statement->bindValue(':price', $_POST['price'], PDO::PARAM_STR);

    

    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_OBJ);

    var_dump($result);

    echo $_GET['id'] . "<br>";
?>
<a href="read.php">terug</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-opdracht</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <h3>Autosgegevens Wijzigen</h3>

    <form method="post" action="update.php">
        <label for="">Merk: </label>
        <input type="text" name="brand" id="" value="<?php echo $result->Merk; ?>" ><br><br>
        <label for="">Model: </label>
        <input type="text" name="model" id="" value="<?php echo $result->Model; ?>" ><br><br>
        <label for="">Topsnelheid: </label>
        <input type="number" name="topspeed" id="" value="<?php echo $result->Topsnelheid; ?>" ><br><br>
        <label for="">Prijs: </label>
        <input type="number" name="price" id="" value="<?php echo $result->Prijs; ?>" ><br><hr>
        <input type="hidden" name="id" value="<?php echo $result->Id; ?>">

        <input type="submit" value="Opslaan">

    </form>
</body>
</html>