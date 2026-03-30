<?php
include_once "view/ViewLogin.php";
include_once "view/ViewAnnonces.php";
include_once "view/ViewPost.php";
class Controllers
{
    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function loginAction()
    {
        require 'view/ViewLogin.php';
    }

    public function annoncesAction( $login, $password)
    {
        $annonces = null;
        if( $this->data->isUser( $login, $password ) )
            $annonces = $this->data->getAllAnnonces();
        else
            $login='';

        $layout = new Layout("view/layout.html");
        $vueAnnonces = new ViewAnnonces($layout, $login, $annonces);

        $vueAnnonces->display();
    }

    public function postAction($id)
    {
        $post = $this->data->getPost($id);

        $layout = new Layout("view/layout.html");
        $vuePost = new ViewPost($layout, $post);

        $vuePost->display();
    }
}
?>