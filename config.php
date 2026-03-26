<?php
// Charge les variables d'environnement depuis le fichier .env
// QUI NE DOIT PAS ETRE COMMIT
$env = parse_ini_file(__DIR__ . '/.env');

// Configuration de la base de données
define('DB_HOST', 'mysql-maamari.alwaysdata.net');
define('DB_USER', 'maamari_annonces');
define('DB_PASS', 'Alousse17074&');
define('DB_NAME', 'maamari_annonces_db');
?>