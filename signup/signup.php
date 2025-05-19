<?php
require_once "../connectdb.php";

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($password !== $confirmPassword) {
        http_response_code(400);
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Insertion sans hachage (⚠️ déconseillé)
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    try {
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
       header("Location: ../login/login.html");
        exit; 
         } catch (PDOException $e) {
        switch ($e->getCode()) {
            case 23000:
                http_response_code(409);
                echo "Nom d'utilisateur déjà pris.";
                break;
            default:
                http_response_code(500);
                echo "Erreur : " . $e->getMessage();
                break;
        }
    }
} else {
    echo "Méthode non autorisée.";
}
