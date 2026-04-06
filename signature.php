<?php
// Fichier supprimé : ancien système de signatures

// Variables pour les templates
$company = $config['company'];

// Valider le style (sécurité)
$allowedStyles = ['gmail', 'outlook', 'dolibarr'];
if (!in_array($style, $allowedStyles)) {
    $style = 'gmail';
}

// Charger le template
$templateFile = __DIR__ . "/templates/{$style}.php";
if (!file_exists($templateFile)) {
    $templateFile = __DIR__ . '/templates/gmail.php';
}

include $templateFile;
