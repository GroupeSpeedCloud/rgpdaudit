<?php
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
$stmt = $db->query('SELECT * FROM audits ORDER BY date_audit DESC');
$audits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Liste des audits RGPD</title>
	<style>
		body { font-family: Arial, sans-serif; background: #f7f7f7; }
		.container { max-width: 900px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
		table { width: 100%; border-collapse: collapse; margin-top: 24px; }
		th, td { border: 1px solid #ddd; padding: 8px; }
		th { background: #007bff; color: #fff; }
		tr:nth-child(even) { background: #f2f2f2; }
		a { color: #007bff; text-decoration: none; }
	</style>
</head>
<body>
<div class="container">
	<h1>Liste des audits RGPD</h1>
	<a href="audit_form.php">+ Nouvel audit</a>
	<table>
		<tr>
			<th>ID</th>
			<th>Titre</th>
			<th>Date</th>
			<th>Auditeur</th>
			<th>Données traitées</th>
			<th>Mesures de sécurité</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($audits as $audit): ?>
		<tr>
			<td><?= $audit['id'] ?></td>
			<td><?= htmlspecialchars($audit['titre']) ?></td>
			<td><?= htmlspecialchars($audit['date_audit']) ?></td>
			<td><?= htmlspecialchars($audit['auditeur']) ?></td>
			<td><?= nl2br(htmlspecialchars($audit['donnees_traitees'])) ?></td>
			<td><?= nl2br(htmlspecialchars($audit['mesures_securite'])) ?></td>
			<td><a href="audit_view.php?id=<?= $audit['id'] ?>">Voir</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
</body>
</html>
