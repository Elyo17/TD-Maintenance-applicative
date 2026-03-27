<?php
//permet d'ouvrir et fermé la connexion
function openConnection()
{
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=tdmaintenance', 'root', '');
    }catch(PDOException $e)
    {
        print "Erreur de connexion!: " . $e->getMessage() . "<br/>";
        die;
    }
    return $dbh;
}

function closeConnection($dbh)
{
    $dbh = null;
}

//Vérifie si l'utilisateur est enregistré
function isUser( $login, $password )
{
    $isuser = False ;
    $link = openConnection();

    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = mysqli_query($link, $query );

    if( mysqli_num_rows( $result) )
        $isuser = True;

    mysqli_free_result( $result );
    closeConnection($link);

    return $isuser;
}

//Retourne un tableau assossiatif
function getAllAnnonces()
{
    $link = openConnection();

    $result = mysqli_query($link,'SELECT id, title FROM Post');
    $annonces = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $annonces[] = $row;
    }

    mysqli_free_result( $result);
    closeConnection($link);

    return $annonces;
}

//Qui retourne l'annonce ayant l'identifiant passé en paramètre
function getPost( $id )
{
    $link = openConnection();

    $id = intval($id);
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
    $post = mysqli_fetch_assoc($result);

    mysqli_free_result( $result);
    closeConnection($link);
    return $post;
}
?>
