<?php
// audit_view.php : détail d'un audit RGPD
$sessionStarted = false;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $sessionStarted = true;
}
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
require_once 'db.php';
if (!isset($_GET['id'])) {
    header('Location: audit_list.php');
    exit;
}
$stmt = $db->prepare('SELECT * FROM audits WHERE id = ?');
$stmt->execute([$_GET['id']]);
$audit = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$audit) {
    echo "Audit introuvable.";
    exit;
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Audit RGPD</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h1 { margin-bottom: 24px; }
        .label { font-weight: bold; }
        .value { margin-bottom: 16px; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h1><?= htmlspecialchars($audit['titre']) ?></h1>
    <div class="label">Date :</div>
    <div class="value"><?= htmlspecialchars($audit['date_audit']) ?></div>
    <div class="label">Auditeur :</div>
    <div class="value"><?= htmlspecialchars($audit['auditeur']) ?></div>
    <div class="label">Description :</div>
    <div class="value"><?= nl2br(htmlspecialchars($audit['description'])) ?></div>
    <div class="label">Données traitées :</div>
    <div class="value"><?= nl2br(htmlspecialchars($audit['donnees_traitees'])) ?></div>
    <div class="label">Mesures de sécurité :</div>
    <div class="value"><?= nl2br(htmlspecialchars($audit['mesures_securite'])) ?></div>
    <a href="audit_list.php">&larr; Retour à la liste</a>
</div>
</body>
</html>
