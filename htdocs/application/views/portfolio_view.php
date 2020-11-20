<h1>Портфолио</h1>
<p>
<table class="table table-bordered">
    Все проекты в следующей таблице являются вымышленными, поэтому даже не пытайтесь перейти по приведенным ссылкам.
    <tr>
        <td>Год</td>
        <td>Проект</td>
        <td>Описание</td>
        <td>id создателя</td>
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
            <td><?= $row['creator_id'] ?></td>
        </tr>
        <?php
    }

    ?>
</table>
</p>

