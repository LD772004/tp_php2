<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="tj.css">
</head>
<body>
<form action="" method="post">
    <label for="name">Nom étudiant:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="etablissement">Établissement:</label>
    <select id="etablissement" name="etablissement" required>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['name'];
        $etablissement = $_POST['etablissement'];
        $stmt = $conn->prepare("INSERT INTO etudiants (name, etablissement) VALUES (:nom, :etablissement)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':etablissement', $etablissement);
        if ($stmt->execute()) {
            echo "";
        } else {
            echo "Erreur: " . $stmt->errorInfo()[2] . "<br>";
        }
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
$conn = null;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT name FROM etablissements");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
?>
    </select><br><br>
    <input type="submit" value="Soumettre">
</form>

