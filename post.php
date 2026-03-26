<?php
    $link = mysqli_connect('localhost', 'root', '', 'blog_db');
    
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$_GET['id'] );
    $post = mysqli_fetch_assoc($result);

    require 'View/post.php';
?>


<?php
    mysqli_close( $link );
?>