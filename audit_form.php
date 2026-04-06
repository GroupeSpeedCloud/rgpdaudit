<?php
require_once 'db.php';
session_start();
$mode = $_GET['mode'] ?? 'simple';
$score = null;
$message = '';
// Liste des points pour l'audit simplifié (minimum légal)
$points_simplifie = [
	'mentions_legales' => 'Mentions légales',
	'responsable_identifie' => 'Responsable identifié',
	'contact_rgpd' => 'Contact RGPD',
	'finalites' => 'Finalités définies',
	'duree_conservation' => 'Durée de conservation',
	'politique_confidentialite' => 'Politique de confidentialité',
	'consentement_cookies' => 'Consentement cookies',
	'bouton_refus' => 'Bouton de refus cookies',
	'pas_tracking_avant_consent' => 'Pas de tracking avant consentement',
	'https' => 'HTTPS',
	'protection_donnees' => 'Protection des données',
	'headers_securite' => 'Headers de sécurité',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mode === 'simple') {
	$score = 0;
	foreach ($points_simplifie as $key => $label) {
		if (!empty($_POST[$key])) $score++;
	}
	$score = intval(($score / count($points_simplifie)) * 100);
	$date_audit = date('Y-m-d');
	$auteur = $_SESSION['user']['email'] ?? 'anonyme';
	$params = [
		'simple',
		$date_audit,
		$auteur,
		$score,
		null,null,null,null,null,null,null,null,null,null
	];
	$stmt = $db->prepare('INSERT INTO audits (type, date_audit, auteur_email, score, finalites, base_legale, categories_donnees, personnes_concernees, destinataires, transferts_hors_ue, duree_conservation, droits_personnes, mesures_securite, observations) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute($params);
	$message = "Audit simplifié enregistré avec un score de conformité de $score/100.";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mode === 'complet') {
	$champs = [
		'finalites', 'base_legale', 'categories_donnees', 'personnes_concernees', 'destinataires', 'transferts_hors_ue', 'duree_conservation', 'droits_personnes', 'mesures_securite', 'observations'
	];
	$score = 0;
	foreach ($champs as $champ) {
		if (!empty($_POST[$champ])) $score++;
	}
	$score = intval(($score / count($champs)) * 100);
	$date_audit = date('Y-m-d');
	$auteur = $_SESSION['user']['email'] ?? 'anonyme';
	$params = [
		'complet',
		$date_audit,
		$auteur,
		$score,
		$_POST['finalites'] ?? null,
		$_POST['base_legale'] ?? null,
		$_POST['categories_donnees'] ?? null,
		$_POST['personnes_concernees'] ?? null,
		$_POST['destinataires'] ?? null,
		$_POST['transferts_hors_ue'] ?? null,
		$_POST['duree_conservation'] ?? null,
		$_POST['droits_personnes'] ?? null,
		$_POST['mesures_securite'] ?? null,
		$_POST['observations'] ?? null
	];
	$stmt = $db->prepare('INSERT INTO audits (type, date_audit, auteur_email, score, finalites, base_legale, categories_donnees, personnes_concernees, destinataires, transferts_hors_ue, duree_conservation, droits_personnes, mesures_securite, observations) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute($params);
	$message = "Audit complet enregistré avec un score de conformité de $score/100.";
}
function aide($texte) {
	return '<span style="color:#888;font-size:0.95em;">' . $texte . '</span>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Audit RGPD <?= $mode === 'complet' ? 'complet' : 'simplifié' ?></title>
	<style>
		body { font-family: Arial, sans-serif; background: #f7f7f7; }
		.container { max-width: 700px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
		label { display: block; margin-top: 16px; }
		input, textarea { width: 100%; padding: 8px; margin-top: 4px; border-radius: 4px; border: 1px solid #ccc; }
		button { margin-top: 20px; padding: 10px 24px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
		.score { color: #007bff; font-size: 1.2em; margin-top: 20px; }
		.switch { margin-top: 24px; }
		.section { margin-top: 32px; margin-bottom: 16px; font-size: 1.1em; font-weight: bold; color: #333; }
		.checklist { margin-left: 16px; }
	</style>
</head>
<body>
<div class="container">
	<h1>Audit RGPD CNIL <?= $mode === 'complet' ? 'complet' : 'simplifié' ?></h1>
	<div class="switch">
		<a href="?mode=simple" style="margin-right:20px;<?= $mode==='simple'?'font-weight:bold;':'' ?>">Audit simplifié</a>
		<a href="?mode=complet" <?= $mode==='complet'?'style="font-weight:bold;"':'' ?>>Audit complet</a>
		<a href="audit_choix.php" style="float:right;">Retour au choix</a>
	</div>
	<?php if ($message): ?>
		<div class="score"><?= htmlspecialchars($message) ?></div>
	<?php endif; ?>
	<?php if ($mode === 'simple'): ?>
	<form method="post">
		<div class="section">🏢 Transparence</div>
		<div class="checklist">
			<label><input type="checkbox" name="mentions_legales"> Mentions légales</label><br>
			<label><input type="checkbox" name="responsable_identifie"> Responsable identifié</label><br>
			<label><input type="checkbox" name="contact_rgpd"> Contact RGPD</label>
		</div>
		<div class="section">📊 Données</div>
		<div class="checklist">
			<label><input type="checkbox" name="finalites"> Finalités définies</label><br>
			<label><input type="checkbox" name="duree_conservation"> Durée conservation</label><br>
			<label><input type="checkbox" name="politique_confidentialite"> Politique confidentialité</label>
		</div>
		<div class="section">🍪 Cookies</div>
		<div class="checklist">
			<label><input type="checkbox" name="consentement_cookies"> Consentement cookies</label><br>
			<label><input type="checkbox" name="bouton_refus"> Bouton refus</label><br>
			<label><input type="checkbox" name="pas_tracking_avant_consent"> Pas de tracking avant consentement</label>
		</div>
		<div class="section">🔒 Sécurité</div>
		<div class="checklist">
			<label><input type="checkbox" name="https"> HTTPS</label><br>
			<label><input type="checkbox" name="protection_donnees"> Protection données</label><br>
			<label><input type="checkbox" name="headers_securite"> Headers sécurité</label>
		</div>
		<button type="submit">Évaluer l'audit</button>
	</form>
	<div style="margin-top:24px;">
		<a href="#" onclick="window.print();return false;">🖨️ Générer rapport client</a> |
		<a href="https://www.cnil.fr/fr/rgpd-par-ou-commencer" target="_blank">📘 Guide audit CNIL</a>
	</div>
	<?php else: ?>
	<form method="post">
		<label for="finalites">Finalités du traitement *<br><?= aide('Pourquoi ces données sont-elles collectées et utilisées ?') ?></label>
		<textarea name="finalites" id="finalites" required></textarea>

		<label for="base_legale">Base légale *<br><?= aide('Ex : obligation légale, contrat, consentement...') ?></label>
		<input type="text" name="base_legale" id="base_legale" required>

		<label for="categories_donnees">Catégories de données traitées *<br><?= aide('Ex : identité, coordonnées, données bancaires...') ?></label>
		<textarea name="categories_donnees" id="categories_donnees" required></textarea>

		<label for="personnes_concernees">Personnes concernées *<br><?= aide('Qui est concerné ? Ex : clients, salariés, fournisseurs...') ?></label>
		<input type="text" name="personnes_concernees" id="personnes_concernees" required>

		<label for="destinataires">Destinataires des données<br><?= aide('Qui reçoit les données ? Ex : service RH, prestataires...') ?></label>
		<textarea name="destinataires" id="destinataires"></textarea>

		<label for="transferts_hors_ue">Transferts hors UE<br><?= aide('Les données sortent-elles de l’UE ? Précisez.') ?></label>
		<input type="text" name="transferts_hors_ue" id="transferts_hors_ue">

		<label for="duree_conservation">Durée de conservation *<br><?= aide('Combien de temps les données sont-elles conservées ?') ?></label>
		<input type="text" name="duree_conservation" id="duree_conservation" required>

		<label for="droits_personnes">Droits des personnes *<br><?= aide('Quels droits pour les personnes concernées ? Ex : accès, rectification, opposition...') ?></label>
		<textarea name="droits_personnes" id="droits_personnes" required></textarea>

		<label for="mesures_securite">Mesures de sécurité *<br><?= aide('Comment les données sont-elles protégées ? Ex : chiffrement, accès restreint...') ?></label>
		<textarea name="mesures_securite" id="mesures_securite" required></textarea>

		<label for="observations">Observations complémentaires<br><?= aide('Remarques, points de vigilance, etc.') ?></label>
		<textarea name="observations" id="observations"></textarea>

		<button type="submit">Évaluer l'audit</button>
	</form>
	<div style="margin-top:24px;">
		<a href="#" onclick="window.print();return false;">🖨️ Générer rapport client</a> |
		<a href="https://www.cnil.fr/fr/rgpd-par-ou-commencer" target="_blank">📘 Guide audit CNIL</a>
	</div>
	<?php endif; ?>
</div>
</body>
</html>
