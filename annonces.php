<?php
$link = mysqli_connect('localhost', 'root', '', 'blog_db');

$query= 'SELECT login FROM Users WHERE login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
$resultlogin = mysqli_query($link, $query );

if( mysqli_num_rows( $resultlogin) ){
    mysqli_free_result( $resultlogin );
    $resultall = mysqli_query($link, 'SELECT id, title FROM Post');
}
else{
    header( "refresh:5;url=index.php" );
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
}
?>

<?php
mysqli_close( $link );
?>
