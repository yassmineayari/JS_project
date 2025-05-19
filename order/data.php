<?php include 'order.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes Commandes</title>
  <link rel="stylesheet" href="../order/order.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Elegance House</div>
        <ul class="nav-links">
            <li><a href="../home/home.html">Accueil</a></li>
            <li><a href="#about">About</a></li>
          <li class="dropdown">
            <a href="#">Collections</a>
            <ul class="dropdown-menu">
              <li><a href="../women/women.html">Women</a></li>
              <li><a href="../men/men.html">Men</a></li>
              <li><a href="../accessories.html">Accessories</a></li>
            </ul>
          </li>
          <li class="cart-icon">
            <a href="../order/data.php">
              <img src="../hijabi/cart.png" alt="Cart" class="tot" />
              <span class="cart-count" id="cart-count">0</span>
            </a>
          </li>
          <li class="accounticon dropdown-user">
            <a href="#">
              <img src="../hijabi/account.png" alt="Account">
              <span id="username-display" class="username-display">Nom d'utilisateur</span>
            </a>
            <ul class="dropdown-user-menu">
              <li><a href="../account/settings.html">Paramètre</a></li>
              <li><a href="../home/homevisit.html">Déconnecter</a></li>
            </ul>
          </li>
    
        </ul>
    </nav>
      

  <h1>Mes Commandes</h1>

  <div class="orders">
    <?php if (!empty($commandes)): ?>
      <?php foreach ($commandes as $commande): ?>
        <div class="commande">
          <p><strong>Produit :</strong> <?= htmlspecialchars($commande['name']) ?></p>
          <p><strong>Prix :</strong> $<?= number_format($commande['price'], 2) ?></p>
          <p><strong>Size :</strong> <?= htmlspecialchars($commande['size']) ?></p>
          <p><strong>Color :</strong> <?= htmlspecialchars($commande['color']) ?></p>


        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Aucune commande trouvée.</p>
    <?php endif; ?>
  </div>



<script>
    
    const username = localStorage.getItem("username");
    if (username) {
      document.getElementById("username-display").textContent = ` ${username}`;
    }
  

        

      </script>

</body>
</html>
