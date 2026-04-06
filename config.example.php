<?php
/**
 * Configuration Google OAuth pour Audit RGPD
 *
 * Copiez ce fichier en config.php et remplissez vos identifiants :
 * cp config.example.php config.php
 *
 * 1. Allez sur https://console.cloud.google.com/
 * 2. Créez un projet ou sélectionnez-en un existant
 * 3. APIs & Services > Identifiants > Créer des identifiants > ID client OAuth 2.0
 * 4. Type : Application Web
 * 5. URI de redirection autorisée : http://localhost:8000/callback.php
 * 6. Copiez Client ID et Client Secret ci-dessous
 */

return [
    'google_client_id' => 'VOTRE_CLIENT_ID',
    'google_client_secret' => 'VOTRE_CLIENT_SECRET',
    'google_redirect_uri' => 'http://localhost:8000/callback.php',
];
