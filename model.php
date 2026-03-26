<?php
function openConnection()
{
    $link = mysqli_connect('mysql', '[compte]_annonces', 'pwd', '[compte]_annonces_db');
    return $link;
}

function closeConnection($link)
{
    mysqli_close($link);
}


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
?>
