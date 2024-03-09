<?php
session_start();

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
    // Rediriger vers la page de connexion avec un message d'erreur
    header('Location: login.php?error=1');
    exit;
}
?>
