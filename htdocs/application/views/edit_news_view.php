<?php if (isset($_SESSION['user_id'])):?>
    <h1>Редактирование новостей</h1>
    <div class="center">
        <form method="post" action="edit_news/insert_data">
            <p><label>Дата создания: <input class="form-control" type="text" placeholder="2020-03-10 18:17:16"
                                            name="start_year" min="1" max="<?= date("Y") ?>"
                                           required></label></p>
            <p><label>Заголовок: <input class="form-control" type="text" placeholder="Найдено лекарство от коронавируса"
                                        name="title" required></label></p>
            <p><label>Текст: <br>
                    <textarea class="form-control" name="text"></textarea></label></p>
            <input class="btn btn-success" type="submit" value="Создать" name="create_new">
        </form>
    </div>
    <?php endif; ?>
    <?php if ($_SESSION['isAdmin'] == 'true'): ?>
        <br>
        <br>
    <div class="container">
    <?php
    require_once 'application/models/model_news.php';
    $author = new Model_News();
    while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <form action="/edit_news/update_data/" method="post" class="table w-100">
            <input name="id" value="<?= $row['id'] ?>" hidden required>
            <div class="row text-break font-weight-bold w-100"><span>Заголовок</span><input class="w-50" type="text" name="edit_title"
                    value="<?= $row['title'] ?>" required></div>
            <br>
            <div class="row"><textarea name="edit_text" class="w-100" required><?= $row['text'] ?></textarea></div>
        <div class="row">
            <div class="col"><input required type="text" name="edit_create_time" value="<?= $row['create_time'] ?>"/></div>
            <div class="col text-right"><input required name="creator_id" value="<?=$row['creator_id']?>" hidden/></div>
        </div>
            <div class="row">
                <input class="btn btn-secondary" required type="submit" value="Изменить" name="update_news">
            </div>
        </form>
        <form action="/edit_news/del_data/" method="post">
            <input type="hidden" name="del_id" required value="<?= $row['id']; ?>">
            <input class="btn btn-danger" type="submit" value="Удалить">
        </form>

        <?php
    }
    ?>
    </div>
<?php endif; ?>

