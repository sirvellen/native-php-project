<div class="container col-2">
    <div class = "row-center text-center">
        <h1 class="display-5 col-2">Вход</h1>
        <?php if (isset($_GET['message'])) {?>
            <div class="alert alert-danger col-12" role="alert">
                <p>Ошибка входа:</p>
                <p><?php if($_GET['message'] == 1) {
                        echo 'Неправильное имя пользователя или пароль';
                    } ?></p>
            </div>
            <?php
        }?>
    </div>
</div>
<form method="post" action="/user/auth" class="container col-2 reg" style="padding: 10px; border:solid #333A40 1px; border-radius:10px;">
    <label>Логин:</label>
    <input type="text" class = "form-control" name="username" value="" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
    <label>Пароль:</label>
    <input type="password" required class = "form-control" name="password" value="" pattern="^[A-Za-z0-9_]{1,32}$">
    <br>
    <input type="submit" class = "form-control btn btn-success" value="Войти">
</form>