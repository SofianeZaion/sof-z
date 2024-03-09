<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['utilisateur'])) {
    header('Location: pageproduitFront.php');
    exit();
}

include '../include/head.php';
?>

<!doctype html>
<html lang="en">
<head>
    <title>Connexion</title>
</head>

<body style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825);height: 100vh;"></body>

<?php include '../include/nav_front.php'; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container py-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5 ">
            <div class="card shadow-lg">
                <div class="card-body" style="background: linear-gradient(to bottom, #87ceeb, #f7b957, #ff6825)">
                    <h4 class="card-title mb-4" style="text-align: center;">Connexion</h4>
                    <?php
                    if (isset($_POST['connexion'])) {
                        $login = $_POST['login'];
                        $password = $_POST['password'];

                        if (!empty($login) && !empty($password)) {
                            require_once '../include/database.php';
                            $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=?');
                            $sqlState->execute([$login]);

                            if ($sqlState->rowCount() >= 1) {
                                $user = $sqlState->fetch();
                                if (password_verify($password, $user['password'])) {
                                    $_SESSION['utilisateur'] = $user;
                                    if ($user['login'] == 'o') {
                                        header('Location: ../indexFront.php');
                                        exit();
                                    } else {
                                        header('Location: pageproduitFront.php');
                                        exit();
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Login ou mot de passe incorrectes.</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Login ou mot de passe incorrectes.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Login ou mot de passe sont obligatoires.</div>';
                        }
                    }
                    ?>

                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="login">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="form-label">Vous n'avez pas de compte ?</label>
                            <a href="ajouter_utilisateurFront.php" class="card-link">Créer un compte </a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block my-3" name="connexion">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
