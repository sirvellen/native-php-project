<br><br>
<div class="container h-auto" style = "border:solid black 1px; border-radius: 5px;padding:18px;">
  <form action="/news/edit/"  method="post" class="h-auto">
    <input type="text" style= "display:none" name="id" value="<?= $_GET['id']; ?>">
    <label>Оглавление:</label>
    <input type="text" class ="form-control" name="title" value="<?= $_GET['title']; ?>"><br>
    <input type="hidden" class ="form-control" name="date" value="<?= date("Y-m-d h:m:s"); ?>">
    <label>Содержание:</label>
      <textarea type="text" class ="form-control h-auto" name="text"><?= $_GET['text'];?></textarea><br>
    <input type="hidden" class ="form-control" name="author" value="<?= isset($_SESSION['user_id']);?>">
    <input type="submit" class = "form-control btn btn-dark col-2" value="изменить">
  </form>
</div>
