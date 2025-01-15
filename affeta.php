<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="tj.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT etablissements.id, etablissements.name FROM etablissements");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo "<table><tr><th>ID</th><th>Établissement</th></tr>";
        foreach ($result as $row) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
?>
</body>
</html>
