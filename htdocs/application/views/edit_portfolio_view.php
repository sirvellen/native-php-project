<?php if ($_SESSION['isAdmin'] == 'true'): ?>
    <h1>Редактирование портфолио</h1>
<div class="center">
    <form method="post" action="edit_portfolio/insert_data">
        <p><label>Год создания: <input class="form-control" type="number" placeholder="2020" name="start_year" min="1" max="<?= date("Y") ?>"
                                       required></label></p>
        <p><label>Ссылка на сайт: <input class="form-control" type="url" placeholder="http://example.com" name="url" required></label></p>
        <p><label>Описание: <br>
        <textarea class="form-control" name="description"></textarea></label></p>
        <input class="btn btn-success" type="submit" value="Создать" name="create_portfolio">
    </form>
</div>
    <p>
    <table class="table table-bordered">
        <tr>
            <td>Год</td>
            <td>Сайт</td>
            <td>Описание</td>
        </tr>
        <br>
        <br>
        <?php

        while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $row['start_year'] ?></td>
                <td><?= $row['url'] ?></td>
                <td><?= $row['description'] ?></td>
            </tr>
            <tr>
                <form action="edit_portfolio/update_data" method="post">
                    <td>
                        <input class="form-control" type="text" placeholder="Год" name="update_start_year"></td>
                    <td>
                        <input class="form-control" type="text" placeholder="Сайт" name="update_url"></td>
                    <td>
                        <textarea class="form-control" placeholder="Описание" name="update_description"></textarea>
                        <input class="btn btn-secondary" type="submit" value="Изменить" name="update_portfolio">
                        <input type="hidden" name="update_id" value="<?= $row['id']; ?>">
                </form>
                    </td>
                    <td>
                <form action="edit_portfolio/del_data" method="post">
                    <input class="btn btn-danger" type="submit" value="Удалить" name="del_portfolio">
                    <input type="hidden" name="del_id" value="<?= $row['id']; ?>">
                </form>
                    </td>
            </tr>
            <?php
        }

        ?>
    </table>
    </p>
<?php else:header("Location: /"); ?>
<?php endif; ?>
