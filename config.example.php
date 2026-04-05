<?php
/**
 * EXEMPLE de configuration Google OAuth
 * 
 * Copiez ce fichier en config.php et remplissez vos identifiants :
 * cp config.example.php config.php
 * 
 * Pour obtenir les identifiants Google :
 * 1. Allez sur https://console.cloud.google.com/
 * 2. Créez un projet ou sélectionnez-en un existant
 * 3. APIs & Services > Credentials > Create Credentials > OAuth 2.0 Client IDs
 * 4. Type: Web application
 * 5. Authorized redirect URI: https://signatures.groupe-speed.cloud/callback.php
 * 6. Copiez Client ID et Client Secret ci-dessous
 */

return [
    'google' => [
        'client_id' => 'VOTRE_CLIENT_ID.apps.googleusercontent.com',
        'client_secret' => 'VOTRE_CLIENT_SECRET',
        'redirect_uri' => 'https://signatures.groupe-speed.cloud/callback.php',
        'hosted_domain' => 'groupe-speed.cloud', // Restreint aux emails @groupe-speed.cloud
    ],
    'company' => [
        'name' => 'Groupe Speed Cloud',
        'domain' => 'groupe-speed.cloud',
        'website' => 'https://groupe-speed.cloud',
        'address' => '10 quai du Moulin, 08600 Givet',
        'logo' => 'https://signatures.groupe-speed.cloud/assets/images/cloudy.png',
    ],
];
