<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="tj.css">
</head>
<body>
<form action="" method="post">
    <label for="first_name">Prénom:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>
    <label for="last_name">password:</label>
    <input type="password" id="last_name" name="last_name" required><br><br>
    <input type="submit" value="Soumettre">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS myDB");
    $conn->exec("USE myDB");

    $createTableSQL = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL
    )";
    $conn->exec($createTableSQL);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);

        if ($stmt->execute()) {
            echo "Données ajoutées avec succès !<br>";
            header("Location: pb.php");
            exit();
        } else {
            echo "Erreur: " . $stmt->errorInfo()[2] . "<br>";
        }

        $stmt->closeCursor();
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
?>
</body>
</html>
