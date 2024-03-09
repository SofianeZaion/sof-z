<?php
   ob_start();
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


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
    <a class="nav-link" href="indexFront.php"><i class="fas fa-info-circle"></i>En savoir plus</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="indexFront.php"><i class="fas fa-envelope"></i>Contact</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pageproduitFront.php"><i class="fas fa-shopping-bag"></i>Produits</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="compteUtilisateurFront.php"><i class="fas fa-user"></i>Mon compte</a>
</li>




              
                <!-- verifie si une session est active -->
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexionFront.php" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
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