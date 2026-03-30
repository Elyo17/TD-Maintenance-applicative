<?php
include 'Model.php';
include 'Controllers.php';
include 'config.php';
$controller = null;

try {
    // construction du modèle
    $data = new Model( new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS) );

    // initialisation du controller
    $controller = new Controllers( $data );

} catch (PDOException $e) {
    print "Erreur de connexion !: " . $e->getMessage() . "<br/>";
    die();
}

// chemin de l'URL demandée au navigateur
// (p.ex. /annonces/index.php)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route la requête en interne
// i.e. lance le bon contrôleur en focntion de la requête effectuée
if ( '/' == $uri || '/index.php' == $uri) {
    $controller->loginAction();
}
elseif ( '/index.php/annonces' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){

    $controller->annoncesAction($_POST['login'], $_POST['password']);
}
elseif ( '/index.php/post' == $uri
    && isset($_GET['id'])) {

    $controller->annoncesAction($_POST['login'], $_POST['password']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>