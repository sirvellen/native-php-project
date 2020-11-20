<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Сайт Димы</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Домой<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/portfolio/index">Портфолио</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts/index">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services/index">Сервисы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/index">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/index">Новости</a>
                </li>
            </ul>
            <span class="form-inline my-2 my-lg-0">
                <?php
                     if (isset($_SESSION['user_id'])) {
                         if ($_SESSION['isAdmin'] == true)
                         {
                             echo '<a class="btn btn-success mr-2" href="/user/admin">Админ-панель</a>';
                         }
                         echo '<a class="btn btn-danger mr-2" href="/user/logout">Выход</a>';
                     }
                     else {
                         echo '<a class="btn btn-success mr-2" href="/user/login">Вход</a>';
                         echo '<a class="btn btn-primary mr-2" href="/User/registrationPage">Регистрация</a>';
                     }
                ?>
            </span>
            <span class="form-inline my-2 my-lg-0">
                <a href="https://rocketbank.ru/birdofhermes" target="_blank" class="btn btn-info">Скинуть на печеньки</a>
            </span>
        </div>
    </nav>
</header>