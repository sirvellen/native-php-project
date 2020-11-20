<br>
<br>
<br>
<br>
<div class="container col-2">
 <div class = "row-center">
   <h1 class="display-5 col-2">Регистрация</h1>
   <?php if (isset($_GET['message'])) {?>
    <div class="alert alert-danger col-12" role="alert">
      <p>Ошибка регистрации:</p>
      <p><?php if($_GET['message'] == 1) {
          echo 'Такой пользователь уже зарегистрирован';
          }
          elseif ($_GET['message'] == 2) {
              echo 'Данные формы введены неверно';

          }?></p>
    </div>
       <?php if($_GET['message'] == 1) {
           echo '<a class="btn btn-primary mb-2 w-100" href="/user/login">Вход</a>';
       }
    }?>
  </div>
  </div>
<form action="/User/registration" method="post" class="container col-2 reg" style="padding: 10px; border:solid #333A40 1px; border-radius:10px;" >
  <label>Логин:</label>
  <input type="text" class = "form-control" name="username" value="" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
  <label>Электронная почта:</label>
  <input type="email" class = "form-control" name="email" value="" required>
  <label>Пароль:</label>
  <input type="password" required class = "form-control" name="password" value=""
         pattern="^[A-Za-z0-9_]{1,32}$">
  <br>
  <input type="submit" class = "form-control btn btn-success" value="Зарегистрироваться">
</form>
