<br><br>
<div class="container" style = "border:solid black 1px; border-radius: 5px;padding:18px;">
  <form action="/news/add/"  method="post">
    <label>Заголовок:</label>
    <input type="text" class ="form-control" name="title">
    <input type="hidden" class ="form-control" name="create_time" value="<?php echo date("Y-m-d h:m:s"); ?>"><br>
    <label>Новость:</label>
    <textarea type="text" class ="form-control" name="text"></textarea>
    <input type="hidden" style="display:none;" name="author" value="<?= $_SESSION['user_id'] ?>"><br>
    <input type="submit" class = "form-control btn btn-dark col-2" value="опубликовать">
  </form>
</div>
