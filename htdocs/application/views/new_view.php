<div class="container">
    <br>
    <?php
    require_once 'application/models/model_news.php';
    $author = new Model_News();

        ?>
        <article class="news table">
            <div class="row text-break font-weight-bold"><h2 class="text-decoration-none w-100 text-center"><?= $_GET['title'] ?></h2></div><br>
            <div class="row"><p><?= $_GET['text'] ?></p></div>
            <div class="row">
                <div class="col"><?= $_GET['create_time'] ?></div>
                <div class="col text-right"><?= $author->get_author($_GET['creator_id']) ?></div>
            </div>
        </article>
    <br>
    <h2 align="center">Комментарии</h2>
        <?php
        while ($row = mysqli_fetch_assoc($data)) {
    ?>
    <article class="comment table">
        <br>
        <div class="row">
            <div class="col"><?= $author->get_author($row['author_id']) ?></div>
            <div class="col"><?= $row['comment_time'] ?></div>
        </div>
        <br>
        <div class="row"><p><?= $row['comment'] ?></p></div>
        <?php if ($_SESSION['isAdmin'] == 'true'): ?>
        <form method="post"
        <?php endif; ?>
    </article>
<?php } ?>