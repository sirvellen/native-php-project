<br><br>
<div class="container">
    <h3><?= $_GET['title']; ?></h3>
    <hr>
    <p><?= $_GET['text']; ?></p>
    <hr>
    <table>
        <tr>
            <td>Автор статьи <?= $_GET['author']; ?></p></td>

        </tr>
        <tr>
            <td class="text-right"><p>Дата публикации: <?= $_GET['data']; ?></p></td>
        </tr>
        </table>
        <hr>
        <h3>Комментарии</h3><br>
        <?php
        $way = $_SERVER['REQUEST_URI'];
        require_once 'application/models/model_news.php';
        $author = new Model_News();
        foreach ($data as $row) {
                ?>
                <div style="border:solid black 1px; border-radius: 5px;padding:18px;">
                    <h4><?= $author->get_author($row['author_id']); ?></h4>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <?php if ($_SESSION['user_id'] == $row['author_id'] && isset($_SESSION['isAdmin']) == false) { ?>
                            <form action="/news/CommentDelete/" method="post">
                                <input name="way" type="hidden" value="<?= $way ?>">
                                <input name="author" type="hidden" value="<?= $row['author_id']; ?>">
                                <input name="id" type="hidden" value="<?= $row['id']; ?>">
                                <input type="submit" class="form-control btn btn-danger mt-2" value="Удалить">
                            </form>
                        <?php }
                    } ?>
                    <hr>

                        <?php if ($_SESSION['isAdmin'] == true) { ?>
                        <form action="/news/CommentEdit/" method="post">
                            <input name="way" type="hidden" value="<?= $way ?>">
                            <input name="author" type="hidden" value="<?= $row['author_id']; ?>">
                            <input name="id" type="hidden" value="<?= $row['id']; ?>">
                            <textarea name="comment" class="w-100"><?= $row['comment']; ?></textarea>
                            <input type="submit" class="form-control btn btn-secondary col mt-1" value="Изменить">
                        </form>
                            <!-- <a class="form-control btn btn-danger" href="/news/CommentDelete/?way=<?php //echo $way?>&id=<?php //echo $row['id'];?>&author=<?php //echo $row['author'];?>">Удалить</a> -->
                            <form action="/news/CommentDelete/" method="post">
                                <input name="way" type="hidden" value="<?= $way ?>">
                                <input name="author" type="hidden" value="<?= $row['author_id']; ?>">
                                <input name="id" type="hidden" value="<?= $row['id']; ?>">
                                <input type="submit" class="form-control btn btn-danger mt-2" value="Удалить">
                            </form>
                    <?php }
                    else {
                        ?>
                    <textarea class="w-100 h-auto" readonly style="resize: none; border: none; outline: none; cursor: default;"> <?php
                        echo $row['comment'];
                        }  ?>
                    </textarea>
                </div>
                <br>
            <?php
        } ?>
        <hr>
        <?php if (isset($_SESSION['user_id'])) { ?>
            <form action="/news/comments/" method="post">
                <input type="hidden" name="way" value="<?= $way ?>">
                <input type="hidden" name="new_id" value="<?= $_GET['id']; ?>">
                <input type="hidden" name="author" value="<?= $_SESSION['user_id']; ?>">
                <input type="text" class ="form-control" name="date" value="<?php echo date("Y-m-d h:m:s"); ?>" hidden  >
                <label><?= $author->get_author($_SESSION['user_id']); ?></label>
                <textarea name="text" class="form-control" name="coment" rows="4" cols="60"></textarea><br>
                <input type="submit" class="form-control btn btn-dark col" value="Оставить комментарий">
            </form><br>
        <?php } ?>
</div>
