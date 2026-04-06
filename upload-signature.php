<?php
// Fichier supprimé : ancien système de signatures
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Générer un nom unique
$uniqueId = uniqid() . '_' . bin2hex(random_bytes(4));
$safeFilename = preg_replace('/[^a-z0-9_-]/i', '_', $filename);
$finalFilename = $safeFilename . '_' . $uniqueId . '.png';
$filePath = $uploadDir . $finalFilename;

// Sauvegarder l'image
if (file_put_contents($filePath, $imageData) === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la sauvegarde']);
    exit;
}

// Générer l'URL publique
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$publicUrl = $protocol . '://' . $host . '/uploads/signatures/' . $finalFilename;

// Retourner l'URL
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'url' => $publicUrl,
    'filename' => $finalFilename
]);
