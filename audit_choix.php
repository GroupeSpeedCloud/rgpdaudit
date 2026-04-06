<?php
// Choix du type d'audit RGPD
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir un audit RGPD</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; text-align: center; }
        .btn { display: block; width: 100%; margin: 20px 0; padding: 18px; font-size: 1.2em; background: #007bff; color: #fff; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; }
        .btn-secondary { background: #6c757d; }
        h1 { margin-bottom: 24px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Quel type d'audit souhaitez-vous réaliser&nbsp;?</h1>
    <a href="audit_form.php?mode=simple" class="btn">Audit RGPD simplifié</a>
    <a href="audit_form.php?mode=complet" class="btn btn-secondary">Audit RGPD complet (conforme CNIL)</a>
</div>
</body>
</html>
