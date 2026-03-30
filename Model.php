<?php
class Model{

    protected $dataAccess = null;
    public function __construct($dataAccess)
    {
        $this->dataAccess = $dataAccess;
    }

    public function __destruct()
    {
        $this->dataAccess = null;
    }

    public function isUser( $login, $password )
    {
        $isuser = False ;


        $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
        $result = $this->dataAccess->query($query);

        if( $result->rowCount())
        {
            $isuser = True;
        }

        $result->closeCursor();

        return $isuser;
    }

    public function getAllAnnonces()
    {

        $result = $this->dataAccess->query('SELECT id, title FROM Post');
        $annonces = array();

        while ($row = $result->fetch()) {
            $annonces[] = $row;
        }

        $result->closeCursor();

        return $annonces;
    }

    public function getPost( $id )
    {

        $id = intval($id);
        $result = $this->dataAccess->query('SELECT * FROM Post WHERE id='.$id);
        $post = $result->fetch();

        $result->closeCursor();

        return $post;
    }
}
?>