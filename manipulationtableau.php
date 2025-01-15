<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants PHP</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f3e7; /* Ton crème */
            margin: 0;
            padding: 0;
            animation: fadeIn 1s ease-in-out;
        }

        h3 {
            color: #8f704d; /* Ton beige-ocre */
            border-bottom: 2px solid #8f704d;
            padding-bottom: 5px;
            animation: fadeIn 1s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: slideIn 0.8s ease-in-out;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #f2e3c6; /* Ton crème clair */
            color: #8f704d;
        }

        tr:nth-child(even) {
            background-color: #fffaf0; /* Ton crème très clair */
        }

        tr:hover td {
            background-color: #f2e3c6; /* Légère surbrillance lors du survol */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            animation: slideUp 1s ease-in-out;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff4e1; /* Légère teinte crème */
            border: 1px solid #ddd;
            border-radius: 5px;
            animation: fadeIn 1s ease-in-out;
        }

        .student-list {
            list-style-type: none;
            padding: 0;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    $tab = array(
        "Lucas",
        "Elodie",
        "Sophie",
        "Antoine",
        "Claire",
    );

    echo "<h3>Tableau initial :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tab as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    $tab[] = "Marc";
    echo "<h3>Après ajout de 'Marc' :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tab as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    unset($tab[0]);
    $tab = array_values($tab);
    echo "<h3>Après suppression de 'Lucas' :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tab as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    $recherche = "Antoine";
    if (in_array($recherche, $tab)) {
        echo "<p class='result'>L'étudiant $recherche est présent dans le tableau.</p>";
    } else {
        echo "<p class='result'>L'étudiant '$recherche' n'est pas présent dans le tableau.</p>";
    }

    foreach ($tab as $cle => $value) {
        if ($value === "Marc") {
            $tab[$cle] = "Julien";
        }
    }

    echo "<h3>Après modification :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tab as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    echo "<h3>Liste des étudiants :</h3>";
    echo "<table>";
    echo "<tr><th>Numéro</th><th>Étudiant</th></tr>";
    $numero = 1;
    foreach ($tab as $etudiant) {
        echo "<tr><td>$numero</td><td>$etudiant</td></tr>";
        $numero++;
    }
    echo "</table>";

    sort($tab);
    echo "<h3>Liste des étudiants triée :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tab as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    $tabInverse = array_reverse($tab);
    echo "<h3>Liste des étudiants après inversion :</h3>";
    echo "<table>";
    echo "<tr><th>Index</th><th>Étudiant</th></tr>";
    foreach ($tabInverse as $index => $etudiant) {
        echo "<tr><td>$index</td><td>$etudiant</td></tr>";
    }
    echo "</table>";

    $nombreEtudiants = count($tab);
    echo "<h3>Nombre d'étudiants : $nombreEtudiants</h3>";

    echo "<h3>Un tableau multidimensionnel :</h3>";
    $etudiants_ages = array(
        "Lucas" => 22,
        "Elodie" => 24,
        "Sophie" => 21,
        "Antoine" => 23,
        "Claire" => 25,
        "Marc" => 22
    );
    echo "<table>";
    echo "<tr><th>Étudiant</th><th>Âge</th></tr>";
    foreach ($etudiants_ages as $etudiant => $age) {
        echo "<tr><td>$etudiant</td><td>$age</td></tr>";
    }
    echo "</table>";
    ?>
</div>

</body>
</html>
