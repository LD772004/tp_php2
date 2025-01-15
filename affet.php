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
    $stmt = $conn->prepare("SELECT id, name, birthday,Adresse, Number,email FROM admnin");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo "<h1>informations personnelles</h1>";
        echo "<table>
        <tr><th>ID</th><th>Nom</th><th>birthday</th> Number<th>email</th></tr>";
        foreach ($result as $row) {

            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>". $row["birthday"]. "</td><td>". $row["adresse"]. "</td><td>". $row["number"]. "</td><td>". $row["birthday"]. "</td>
                  <td><a href='modet.php?id=" . $row["id"] . "'>Modifier</a></td></tr>";
        }
        echo "</table>";

    } else {
        echo "Aucun résultat trouvé.";
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
