<?php
session_start();

$error = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier les identifiants de connexion
    if ($_POST['login'] === 'sofiane' && $_POST['password'] === 'zaion') {
        // Créer une session utilisateur
        $_SESSION['utilisateur'] = [
            'login' => 'sofiane'
            // Vous pouvez ajouter d'autres données utilisateur ici si nécessaire
        ];

        // Rediriger vers la page admin.php
        header('Location: admin.php');
        exit;
    } else {
        // Afficher un message d'erreur
        $error = 'Login ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Sof'za-Admin</title>
    <!-- Liens vers les feuilles de style CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Liens vers les scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Formulaire de connexion -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Connexion</div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="login">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
