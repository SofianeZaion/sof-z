<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Paiement</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Informations de paiement
                </div>
                
                <div class="card-body">
                    <!-- Formulaire de paiement -->
                    <form action="#" method="POST" id="paymentForm">
                        <div class="form-group">
                            <label for="nom">Nom sur la carte</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Numéro de carte</label>
                            <input type="text" class="form-control" id="numero" name="numero" pattern="[0-9]{16}" required>
                            <small class="text-muted">Doit contenir exactement 16 chiffres</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="expiration">Date d'expiration (MM/AA)</label>
                                <input type="text" class="form-control" id="expiration" name="expiration" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" pattern="[0-9]{3}" required>
                                <small class="text-muted">Les 3 chiffres au dos de votre carte</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant à payer (€)</label>
                            <input type="text" class="form-control" id="montant" name="montant" value="<?php echo isset($_GET['total']) ? $_GET['total'] : '0'; ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Payer</button>
                    </form>
                    <!-- Chargement -->
                    <div id="loading" style="display: none; text-align: center;">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif" alt="Loading...">
                        <p>Processing Payment...</p>
                    </div>
                    <!-- Message de paiement réussi -->
                    <div id="successMessage" style="display: none; text-align: center;">
                        <p>Paiement réussi!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Validation du formulaire de paiement
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Affiche le chargement
        document.getElementById('loading').style.display = 'block';
        // Simulation de traitement de paiement 
        setTimeout(function() {
            // Cache le chargement
            document.getElementById('loading').style.display = 'none';
            // Affiche le message de paiement réussi
            document.getElementById('successMessage').style.display = 'block';
            // Redirige vers la page d'accueil après un certain temps (3 secondes)
            setTimeout(function() {
                window.location.href = 'indexFront.php';
            }, 3000);
        }, 2000); // Temps de simulation du traitement (2 secondes)
    });
</script>

<!--Dans ce code :

J'ai ajouté deux div supplémentaires pour afficher le chargement et le message de paiement réussi.
Le JavaScript est utilisé pour intercepter la soumission du formulaire, afficher le chargement pendant le traitement, simuler le traitement du paiement, afficher le message de paiement réussi, puis rediriger vers la page d'accueil après un certain temps (3 secondes dans cet exemple).
Vous pouvez personnaliser les messages et les délais en fonction de vos besoins.!-->

</body>
</html>
