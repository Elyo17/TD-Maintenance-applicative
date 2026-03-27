<?php
// Charge les variables d'environnement depuis le fichier .env
// QUI NE DOIT PAS ETRE COMMIT
$env = parse_ini_file(__DIR__ . '/.env');

// Configuration de la base de données
define('DB_HOST', $env['DB_HOST']);
define('DB_USER', $env['DB_USER']);
define('DB_PASS', $env['DB_PASSWORD']);
define('DB_NAME', $env['DB_NAME']);

?>