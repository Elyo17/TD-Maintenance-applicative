
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Exemple Blog Basic PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<p> Hello <?php echo $_POST['login']; ?> </p>
<h1>List of Posts</h1>
<ul>
    <?php foreach( $annonces as $post ) : ?>
        <li>
            <a href="post.php?id=<?php echo $post['id']; ?>">
                <?php echo $post['title']; ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

</body>
</html>

