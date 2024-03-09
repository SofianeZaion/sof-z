<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Créer un compte</title>
</head>
<body style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825); height: 100vh;">
    <?php include '../include/nav_front.php' ?>
    <br><br><br><br><br><br>
    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-lg-5 ">
                <div class="card shadow-lg">
                    <div class="card-body" style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825)">
                        <h4 class="card-title mb-4" style="text-align: center;">Créer un compte</h4>
                        <?php
                        if (isset($_POST['ajouter'])) {
                            $login = $_POST['login'];
                            $password = $_POST['password'];
                            $confirm_password = $_POST['confirm_password'];
                            
                            if (!empty($login) && !empty($password) && !empty($confirm_password)) {
                                if ($password === $confirm_password) {
                                    require_once '../include/database.php';
                                    
                                    // Vérifier si le login est déjà utilisé
                                    $stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateur WHERE login = ?');
                                    $stmt->execute([$login]);
                                    $count = $stmt->fetchColumn();
                                    
                                    if ($count == 0) {
                                        // Hasher le mot de passe
                                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                        
                                        // Insérer l'utilisateur dans la base de données
                                        $stmt = $pdo->prepare('INSERT INTO utilisateur (login, password) VALUES (?, ?)');
                                        $stmt->execute([$login, $hashed_password]);
                                        
                                        echo "Votre compte a bien été créé";
                                        header('Location: ConnexionFront.php');
                                        exit;
                                    } else {
                                        echo "Ce login est déjà utilisé.";
                                    }
                                } else {
                                    echo "Les mots de passe ne correspondent pas.";
                                }
                            } else {
                                echo "Veuillez remplir tous les champs.";
                            }
                        }
                        ?>
                        <form method="post" autocomplete="off">
                            <div class="form-group">
                                <label class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="login" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirmation du mot de passe</label>
                                <input type="password" class="form-control" name="confirm_password" required>
                           </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Vous avez déjà un compte ?</label>
                                <a href="Connexion2.php" class="card-link">Se connecter</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block my-3" name="ajouter">Créer un compte</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
