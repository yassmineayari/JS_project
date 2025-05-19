<?php
// Connexion à la base
$servername = "localhost";
$username = "root"; // à adapter
$password = "";     // à adapter
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données POST
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$size = $_POST['size'] ?? '';
$color = $_POST['color'] ?? '';

// Valider données basiques
if (empty($name) || empty($price) || empty($size) || empty($color)) {
    echo "Veuillez remplir toutes les informations.";
    exit;
}

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO `order` (name, price, size, color) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdss", $name, $price, $size, $color);

if ($stmt->execute()) {
    echo "Produit ajouté au panier avec succès !";
} else {
    echo "Erreur lors de l'ajout : " . $conn->error;
}

$stmt->close();
$conn->close();
?>
