<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Sof'za</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        .header {
            background-image: url('images/imagefond.png');
            background-size: cover;
            background-position: center;
            color: black;
            padding: 100px 0;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .jumbotron {
            background-color: #007bff;
            color: white;
            padding: 2rem 1rem;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .btn-start-shopping {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 18px;
            text-decoration: none;
        }
        .btn-start-shopping:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .info-box {
            background-color: #007bff;
            color: white;
            border: 1px solid #ced4da;
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .footer {
            background-color: #343a40;
            color: #28a745;
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #ffffff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light" style="background-color: #5f22e1; width: 100%;">
    <div class="container-fluid">
        <img src="images/yasoshop.png" alt="logo" style="float: left; margin-right: 15px; width: 75px;"> 
        <a class="navbar-brand" href="#" style="font-size: 2em; margin-top: -8px; margin-left: -8px">Sof'z<span style="color:chartreuse">a</span></a>
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarNav" >
            <ul class="navbar-nav d-flex w-100 justify-content-center ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="indexFront.php"><i class="fas fa-home fa-lg"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#en-savoir-plus"><i class="fas fa-info-circle"></i>En savoir plus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact"><i class="fas fa-envelope"></i>Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pageproduitFront.php"><i class="fas fa-shopping-bag"></i>Produits</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="compteUtilisateurFront.php"><i class="fas fa-user"></i>Mon compte</a>
                </li>
                

                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                            <i class="fas fa-sign-out-alt"></i>Déconnexion  
                        </a> 
                    </li>

                    <li class="nav-item" onmouseover="showButtons()" onmouseout="hideButtons()">
                    <a class="nav-link">Bonjour <?php echo $_SESSION['utilisateur']['login'] ?></a>
                    <div class="button-list" id="buttonList">
                        <button class="btn" onclick="location.href='parametres.php'">Paramètres</button>
                        <button class="btn" onclick="location.href='compte.php'">Compte</button>
                        <button class="btn" onclick="location.href='historique.php'">Historique</button>
                        <button class="btn" onclick="location.href='deconnexionFront.php'">Déconnexion</button>
                    </div>
                    </li>

                    <style>
.button-list {
  display: none;
  position: absolute;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 5px;
}

.nav-item:hover .button-list {
  display: block;
}
                    </style>

                    <script>
function showButtons() {
  document.getElementById('buttonList').style.display = 'block';
}

function hideButtons() {
  document.getElementById('buttonList').style.display = 'none';
}
                    </script>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouter_utilisateurFront.php"><i class="fas fa-user-plus"></i>Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ConnexionFront.php"><i class="fas fa-sign-in-alt"></i>Connexion</a>
                    </li>
                <?php endif; ?> 
            </ul>
        </div>

        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []);
        }
        function calculerRemise($prix, $discount)
        {
            return $prix - (($prix * $discount) / 100);
        }
        ?>

        <a class="btn float-end" href="panierFront.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            (<?php echo $productCount; ?>)</a>
    </div>
</nav>   

<div class="header">
     <h1><span style="color: #28a745;">B</span>ienvenue chez Sof'za,</h1>
     <h2><span style="color: #28a745;">V</span>otre shopping mode simplifié</h2>

</div>

<div class="container">
    <div class="jumbotron">
        <h3>Bienvenue sur Sof'za, votre destination en ligne pour des achats pratiques et faciles !</h3>
        <p>Nous sommes une entreprise passionnée par la qualité, la valeur et le service à la clientèle exceptionnel.</p>
        <p>Notre mission est de fournir à nos clients une expérience d'achat en ligne rapide, simple et pratique, tout en offrant une sélection de produits de qualité supérieure à des prix abordables.</p>
        <div class="text-center"> <!-- Utilisation de la classe Bootstrap pour centrer le contenu -->
    <a href="pageproduitFront.php" class="btn btn-start-shopping" style="background-color: #28a745; border-color: #000000;">Commencer mes achats</a>
</div>
 </div>

   <div id="en-savoir-plus" class="info-box" style="background-color: #007bff;">
        <h3>Notre engagement envers la qualité</h3>
        <p>Chez Sof'za, nous sommes fiers de notre engagement envers nos clients et nous nous efforçons de leur offrir une expérience de magasinage en ligne agréable et transparente.</p>
        <p>Nous sommes déterminés à maintenir les normes de qualité les plus élevées pour tous les produits que nous proposons.</p>
    </div>

   <div id="contact" class="info-box" style="background-color: #343a40;">
        <h3>Contactez-nous</h3>
        <p>Vous pouvez nous contacter par téléphone, email ou en remplissant le formulaire de contact ci-dessous :</p>
        <ul>
            <li><strong>Téléphone:</strong> +33 7 66 51 67 19</li>
            <li><strong>Email:</strong> sofianezaion@outlook.fr</li>
        </ul>
        <form action="envoyer_mailFront.php" method="post">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Entrez votre message" required></textarea>
            </div>
            <div class="text-center"> <!-- Utilisation de la classe Bootstrap pour centrer le contenu -->
    <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #000000;">Envoyer</button>
       </div>
            
        </form>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Sof'za - Tous droits réservés</p>
    </div>
</footer>

</body>
</html>
