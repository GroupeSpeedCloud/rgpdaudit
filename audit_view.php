<?php
require_once 'auth.php';
require_once 'db.php';
session_start();
if (!isset($_GET['id'])) {
    header('Location: audit_dashboard.php');
    exit;
}
$stmt = $db->prepare('SELECT * FROM audits WHERE id = ?');
$stmt->execute([$_GET['id']]);
$audit = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$audit) {
    echo "Audit introuvable.";
    exit;
}
function champ($label, $val) {
    if (!$val) return '';
    return '<tr><th>'.$label.'</th><td>'.nl2br(htmlspecialchars($val)).'</td></tr>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Audit RGPD</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h1 { margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 24px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f2f2f2; width: 220px; }
        .btn { display: inline-block; padding: 8px 18px; background: #007bff; color: #fff; border: none; border-radius: 4px; text-decoration: none; margin: 0 4px; }
        .score { color: #007bff; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>Détail Audit RGPD</h1>
    <a href="audit_dashboard.php" class="btn">Retour au dashboard</a>
    <table>
        <tr><th>Date</th><td><?= htmlspecialchars($audit['date_audit']) ?></td></tr>
        <tr><th>Type</th><td><?= $audit['type']==='complet'?'Complet':'Simplifié' ?></td></tr>
        <tr><th>Auteur</th><td><?= htmlspecialchars($audit['auteur_email']) ?></td></tr>
        <tr><th>Score</th><td class="score"><?= (int)$audit['score'] ?>/100</td></tr>
        <?= champ('Finalités', $audit['finalites']) ?>
        <?= champ('Base légale', $audit['base_legale']) ?>
        <?= champ('Catégories de données', $audit['categories_donnees']) ?>
        <?= champ('Personnes concernées', $audit['personnes_concernees']) ?>
        <?= champ('Destinataires', $audit['destinataires']) ?>
        <?= champ('Transferts hors UE', $audit['transferts_hors_ue']) ?>
        <?= champ('Durée de conservation', $audit['duree_conservation']) ?>
        <?= champ('Droits des personnes', $audit['droits_personnes']) ?>
        <?= champ('Mesures de sécurité', $audit['mesures_securite']) ?>
        <?= champ('Observations', $audit['observations']) ?>
    </table>
    <div style="margin-top:24px;">
        <a href="#" onclick="window.print();return false;" class="btn">🖨️ Imprimer / Générer rapport</a>
    </div>
</div>
</body>
</html>
