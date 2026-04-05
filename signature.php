<?php
session_start();

// Vérifier l'authentification
if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit('Non autorisé');
}

$config = require __DIR__ . '/config.php';

// Paramètres
$style = $_GET['style'] ?? 'gmail';
$name = htmlspecialchars($_GET['name'] ?? $_SESSION['user']['name']);
$job = htmlspecialchars($_GET['job'] ?? '');
$email = htmlspecialchars($_GET['email'] ?? $_SESSION['user']['email']);

// Variables pour les templates
$company = $config['company'];

// Charger le template
$templateFile = __DIR__ . "/templates/{$style}.php";
if (!file_exists($templateFile)) {
    $templateFile = __DIR__ . '/templates/gmail.php';
}

include $templateFile;
