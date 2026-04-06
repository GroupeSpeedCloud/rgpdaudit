<?php
// db.php : gestion de la connexion SQLite et création de la table audits conforme CNIL
$dbFile = __DIR__ . '/rgpd_audits.sqlite';
try {
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Table audits : type (simple/complet), score, auteur, champs CNIL
    $db->exec('CREATE TABLE IF NOT EXISTS audits (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        type TEXT NOT NULL,
        date_audit TEXT NOT NULL,
        auteur_email TEXT NOT NULL,
        score INTEGER NOT NULL,
        finalites TEXT,
        base_legale TEXT,
        categories_donnees TEXT,
        personnes_concernees TEXT,
        destinataires TEXT,
        transferts_hors_ue TEXT,
        duree_conservation TEXT,
        droits_personnes TEXT,
        mesures_securite TEXT,
        observations TEXT
    )');
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
?>
