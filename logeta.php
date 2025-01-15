<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="tj.css">
</head>
<body>
<form action="" method="post">
    <label for="etablissement">Établissement:</label>
    <input type="text" id="etablissement" name="etablissement" required><br><br>
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

    $createTableSQL = "CREATE TABLE IF NOT EXISTS etablissements (
        id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )";
    $conn->exec($createTableSQL);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $etablissement = $_POST['etablissement'];

        $stmt = $conn->prepare("INSERT INTO etablissements (name) VALUES (:etablissement)");
        $stmt->bindParam(':etablissement', $etablissement);

        if ($stmt->execute()) {

            echo "<p>Etablissement ajouté avec succès!</p>";
        } else {
            echo "<p>Erreur: " . $stmt->errorInfo()[2] . "</p>";
        }
    }
} catch(PDOException $e) {
    echo "<p>Erreur: " . $e->getMessage() . "</p>";
}

$conn = null;
?>
</body>
</html>
