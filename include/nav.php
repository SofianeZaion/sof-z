<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sof'z-Admin</title>
    <!-- Les autres balises d'en-tête ici -->
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sof'z-Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="categories.php"><i class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="produits.php"><i class="fa-solid fa-tag"></i> Liste des produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="commandes.php"><i class="fa-solid fa-barcode"></i> Commandes</a>
                </li>
            </ul>
        </div>
        <a class="btn float-end" href="front/indexFront.php"><i class="fa-solid fa-cart-shopping"></i> Site front</a>
    </div>
</nav>
</body>
</html>
