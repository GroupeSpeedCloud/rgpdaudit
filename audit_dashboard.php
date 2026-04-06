
<?php
require_once 'auth.php';
require_once 'db.php';
session_start();

$stmt = $db->query('SELECT * FROM audits ORDER BY date_audit DESC, id DESC');
$audits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord – Audits RGPD</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 1000px; margin: 40px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h1 { margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 24px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #007bff; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
        .btn { display: inline-block; padding: 8px 18px; background: #007bff; color: #fff; border: none; border-radius: 4px; text-decoration: none; margin: 0 4px; }
        .btn-secondary { background: #6c757d; }
        .score { font-weight: bold; }
        .type-s { color: #007bff; font-weight: bold; }
        .type-c { color: #28a745; font-weight: bold; }
        .actions { white-space: nowrap; }
    </style>
</head>
<body>
<div class="container">
    <h1>Tableau de bord – Audits RGPD</h1>
    <a href="audit_choix.php" class="btn">+ Nouvel audit</a>
    <table>
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Auteur</th>
            <th>Score</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($audits as $audit): ?>
        <tr>
            <td><?= htmlspecialchars($audit['date_audit']) ?></td>
            <td class="<?= $audit['type']==='complet'?'type-c':'type-s' ?>">
                <?= $audit['type']==='complet'?'Complet':'Simplifié' ?>
            </td>
            <td><?= htmlspecialchars($audit['auteur_email']) ?></td>
            <td class="score"><?= (int)$audit['score'] ?>/100</td>
            <td class="actions">
                <a href="audit_view.php?id=<?= $audit['id'] ?>" class="btn btn-secondary">Voir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
