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
    <h3>CRUD-PHP-PDO-opdracht</h3>

    <form method="post" action="create.php">
        <label for="">Merk: </label>
        <input type="text" name="brand" id=""><br><br>
        <label for="">Model: </label>
        <input type="text" name="model" id=""><br><br>
        <label for="">Topsnelheid: </label>
        <input type="number" name="topspeed" id=""><br><br>
        <label for="">Prijs: </label>
        <input type="number" name="price" id=""><br><hr>

        <input type="submit" value="Opslaan">

    </form>
</body>
</html>