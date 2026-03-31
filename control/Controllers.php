<?php
include_once "gui/ViewLogin.php";
include_once "gui/ViewAnnonces.php";
include_once "gui/ViewPost.php";
include_once "service/AnnoncesChecking.php";

class Controllers
{
    public function annoncesAction($login, $password, $data, $annoncesCheck)
    {
       if($annoncesCheck->authenticate($login, $password, $data) )
           $annoncesCheck->getAllAnnonces($data);
    }

    public function postAction($id, $data, $annoncesCheck)
    {
        $annoncesCheck->getPost($id, $data);
    }
}
?>