<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // À adapter si nécessaire
$password = "";     // À adapter si nécessaire
$dbname = "projet";

// Connexion MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête
$sql = "SELECT name, price,size,color FROM `order`";
$result = $conn->query($sql);

// Stockage des résultats dans un tableau
$commandes = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commandes[] = $row;
    }
}

$conn->close();
?>
