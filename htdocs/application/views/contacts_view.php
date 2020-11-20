<form method="post" class="container" action="/contacts/message">
    <h2 align="center">Ну, пишите сюда что ли</h2>
    <span>Куда отвечать: </span><br>
    <input class="form-control" type="email" name="email" placeholder="Мыло"><br>
    <span>Чо хотели: </span><br>
    <textarea placeholder="Сообщение" name="text" class="form-control"></textarea><br>
    <input type="hidden" style="display:none;" name="author" value="<?= $_SESSION['user_id'] ?>">
    <input type="hidden" class ="form-control" name="date" value="<?= date("Y-m-d h:m:s"); ?>">
    <input type="submit" class="form-control btn btn-dark col" value="Отправить">
</form>