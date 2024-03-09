<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sof'z-Admin</title>
    <!-- Liens vers les feuilles de style CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Liens vers les scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Sof'z-Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produits.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="commandes.php">Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenu principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tableau de bord</div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['utilisateur'])): ?>
                        <h5 class="card-title">Bonjour <?php echo $_SESSION['utilisateur']['login']; ?>, vous êtes administrateur.</h5>
                        <p class="card-text">Modifier vos produits et catégories ici.</p>
                        <?php else: ?>
                        <p class="card-text">Vous devez vous connecter pour accéder à cette page.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
