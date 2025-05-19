<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil</title>
</head>
<body>
  <nav>
    Bonjour, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
    <a href="logout.php">Déconnexion</a>
  </nav>
</body>
</html>
