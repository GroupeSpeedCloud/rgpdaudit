<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';

// Si déjà connecté, rediriger vers le dashboard
if (isset($_SESSION['user'])) {
    header('Location: audit_dashboard.php');
    exit;
}

// Préparer l'URL d'authentification Google
$client = new Google\Client();
$client->setClientId($config['google_client_id']);
$client->setClientSecret($config['google_client_secret']);
$client->setRedirectUri($config['google_redirect_uri']);
$client->addScope('email');
$client->addScope('profile');
$authUrl = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Audit RGPD - Groupe Speed Cloud</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; text-align: center; }
        button { padding: 12px 32px; background: #4285F4; color: #fff; border: none; border-radius: 4px; font-size: 18px; cursor: pointer; }
        img { width: 48px; vertical-align: middle; margin-right: 8px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Audit RGPD</h1>
    <p>Connectez-vous avec Google pour accéder à l'application.</p>
    <a href="<?= htmlspecialchars($authUrl) ?>"><button><img src="https://developers.google.com/identity/images/g-logo.png" alt="Google"> Connexion Google</button></a>
</div>
</body>
</html>
