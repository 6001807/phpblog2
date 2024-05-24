<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include_once 'classes/class.posts.php';
    $post = new Post();
    $allPosts = $post->fetchAll();
?>
<body>
    <section id='post-list'>
        <?php foreach($allPosts as $post) { ?>
            <section class="post-item">
                <h2><?php echo $post['title']; ?></h2>
                <p><?php echo $post['description']; ?></p>
                <p><?php echo $post['content']; ?></p>
                <section class='link'>
                    <p><a href="post.php?<?php echo 'id=' . $post['id'] ?>">Link to post</a></p>
                </section>
            </section>
        <?php } ?>
    </section>
</body>
</html>