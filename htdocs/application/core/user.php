<?php
class User {
    public $user;
    public $userID, $login, $password, $email;

    function __construct() {
        global $db;

        if (isset($_SESSION['user_id']) && $db->query("SELECT COUNT(*) FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "' LIMIT 1")->fetchColumn() == 1) {
            # Создаем массив с данными пользователя
            $this->user = $db->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "' LIMIT 1")->fetch();

            setcookie('user_id', $user['id'], time() + 60 * 60 * 24 * 365);
            setcookie('password', md5($user['password']), time() + 60 * 60 * 24 * 365);

            $this->userID = $this->user['id'];
        }
    }

    public static function login($login, $password) {
        global $db;

        $user = $db->query("SELECT * FROM `users` WHERE `username` = '$login' AND `password` = '" . md5($password) . "' LIMIT 1")->fetch(); // Создаем массив с данными юзера

        $_SESSION['user_id'] = $user['id']; // Создаем ID в сессиии
    }

    public function registerUser($user_login, $user_password, $user_email) {
        global $db;

        $this->login = $user_login;
        $this->password = md5($user_password);
        $this->email = $user_email;

        /**
         * Подготавливаем запрос
         */
        $st = $db->prepare("INSERT INTO `users` (`username`, `password`, `email`)
                VALUES (:login, :password, :email)");
        /**
         * Регистрируем пользователя в БД
         */
        $st->execute(array(
            'login' => $this->login,
            'password' => $this->password,
            'email' => $this->email,
            'time' => time()
        ));

        return true;
    }
}