<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            color: #333;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            border: none;
            background-color: #5f22e1;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4a0bb8;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['utilisateur'])) {
    $login = $_SESSION['utilisateur']['login'];
    $password = $_SESSION['utilisateur']['password'];
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ConnexionFront.php');
    exit();
}
?>

<div class="form-container">
    <h2>Mon Compte</h2>
    <form>
        <div class="form-group">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" id="login" class="form-control" name="login" value="<?php echo $login; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" class="form-control" name="password" value="<?php echo $password; ?>" readonly>
        </div>

        <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-block my-3">Retour</button>
    </form>
</div>

</body>
</html>
