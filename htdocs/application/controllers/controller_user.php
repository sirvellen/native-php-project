<?php

class Controller_User extends Controller
{
    public $user;
    public $userID, $login, $password, $email;

    function __construct()
    {
        global $db;

        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('user_view.php', 'template_view.php', $data);
    }

    function action_login()
    {
        global $db;

        $this->view->generate('user_login_view.php', 'template_view.php');

    }

    public function action_auth()
    {
        $login = $_POST['username'];
        $password = $_POST['password'];
        $auth = $this->model->login($login, $password);
        if ($auth != NULL) {
            $_SESSION['user_id'] = $auth['id']; // Создаем ID в сессиии
            if ($auth['role'] == 'admin') {
                $_SESSION['isAdmin'] = true;
            }
            $this->view->generate('user_login_success.php', 'template_view.php');
        } else {
            $this->view->generate('user_login_error.php', 'template_view.php');
        }

    }

    public function action_logout()
    {
        $_SESSION['isAdmin'] = NULL;
        session_destroy();
        header('Location:/');
    }

    public function action_admin()
    {
        if (isset($_SESSION['isAdmin']) == true) {
            $data = $this->model->get_data();
            $this->view->generate('admin_view.php', 'template_view.php', $data);
        } else {
            header('Location:/');
        }
    }

    function action_edit_users()
    {
        if (isset($_SESSION['isAdmin']) == true) {
            $data = $this->model->get_data();
            $this->view->generate('edit_users_view.php', 'template_view.php', $data);
        } else {
            header('Location:/');
        }
    }

    function action_registrationPage()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }

    function action_EditRole()
    {
        if (isset($_POST['role']) && isset($_POST['id']) && isset($_SESSION['isAdmin']) == true) {
            $role = $_POST['role'];
            $id = $_POST['id'];
            if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL != false)) {
                $email = $_POST['email'];
            } else {
                $email = false;
            }
            $this->model->EditRole($role, $id, $email);
        }
        header('Location:/User/edit_users');
    }

    function action_delete()
    {
        if (isset($_GET['id']) && isset($_SESSION['isAdmin']) == true) {
            $id = $_GET['id'];

            $this->model->delete($id);
        }
        header('Location:/User/AdminPanel');
    }

    function action_registration()
    {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $login = $_POST['username'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            if (preg_match("#^[A-Za-z0-9_]{1,32}$#", $login) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
                && preg_match('#^[A-Za-z0-9_]{1,32}$#', $password)) {
                $reg = $this->model->registration($login, $email, $password);
            } else {
                $messageid = 2;
                header('Location:/User/registrationPage/?message=' . $messageid);
            }

            if ($reg != false) {
                $auth = $this->model->login($login, $password);

                if ($auth != NULL) {
                    $_SESSION['user_id'] = $auth['id']; // Создаем ID в сессиии
                    if ($auth['role'] == 'admin') {
                        $_SESSION['isAdmin'] = true;
                    } else {
                        $_SESSION['isAdmin'] = false;
                    }
                    header('Location:' . $host . '/');
                } else {
                    $_SESSION["is_auth"] = 2;
                    $messageid = 1;
                    header('Location:/User/registrationPage');
                }
            } else {
                header('Location:/User/registrationPage/?message=' . $messageid);
            }
        }
    }

}
