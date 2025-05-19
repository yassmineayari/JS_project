<?php
session_start();
require_once "../connectdb.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['username'] = $username;
        // Redirection vers la page home.html classique
        header("Location: ../home/home.html");
        exit;
    } else {
        // Ici tu peux rediriger vers login.html avec un message d'erreur en GET par exemple
        header("Location: ../login/login.html?error=1");
        exit;
    }
} else {
    echo "Méthode non autorisée.";
}
