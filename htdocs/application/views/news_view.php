<br><br>
<div class="container col-4">
<?php
require_once 'application/models/model_news.php';
$author = new Model_News();
if (isset($_SESSION['user_id'])) {?>

  <form method="post" action="/news/addPage/">
    <table>
      <tr>
        <td>
          <h4>Добро пожаловать, <?= $author->get_author($_SESSION['user_id']); ?>&nbsp;</h4>
        </td>
        <td>
          <input type="submit" class="form-control btn btn-dark" name="add"  value="Добавить новость">
        </td>
      </tr>
    </table>
  </form>
<?php } else {?>
  <h5>Чтобы добавлять записи и оставлять комментарии нужно <a href="/user/login">войти</a> или <a href="/user/register">зарегистрироваться</a></h5></p>
<?php } ?>
</div>
<hr>
<?php foreach ($data as $row){?>

  <div class="container" style = "border:solid #333A40 1px; border-radius: 10px; padding:18px;">
    <a style = "color:black; text-decoration: none;" href="/news/Page/?id=<?= $row['id'];?>&title=<?= $row['title'];?>&data=<?= $row['create_time'];?>&author=<?= $author->get_author($row['creator_id']);?>&text=<?= $row['text'];?>">

        <h4> <?= $row['title'];?></h4></a>
        <h6> <?= $row['date']; ?></h6>
          <?php
          if (isset($_SESSION['user_id'])) {
          if ($_SESSION['user_id'] == $row['creator_id'] || isset($_SESSION['isAdmin']) == true) {?>
            <table>
            <tr>
              <td>
                <a class="form-control btn btn-dark" href="/news/editPage/?id=<?= $row['id'];?>&title=<?= $row['title'];?>
                  &author=<?= $author->get_author($row['creator_id']); ?>&text=<?= $row['text'];?>">редактировать</a>
              </td>
              <td>
                <a class="form-control btn btn-danger" href="/news/delete/?id=<?= $row['id'];?>&author=<?= $row['creator_id']; ?>">Удалить</a>
              </td>
            </tr>
          </table>
        <?php } }?>
      <hr>
        <div class=""><img src="/upload/<?= $row['image_name'] ?>" alt="" height="250px"><textarea class="w-100 h-auto" readonly style="resize: none; border: none; outline: none; cursor: default;"><?= $row['text'];?></textarea></div><hr>
      <div class=""><h6><?= $author->get_author($row['creator_id']);?></h6></div>
  </div>

  <br>
<?php } ?>
