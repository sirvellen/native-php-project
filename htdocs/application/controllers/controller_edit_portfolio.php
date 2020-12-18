<?php

require_once 'application/models/model_edit_portfolio.php';

class Controller_Edit_Portfolio extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Edit_Portfolio();
    }

    public function action_index()
    {
        $data = $this->model->get_data('portfolio');
        $this->view->generate('edit_portfolio_view.php', 'template_view.php', $data);
    }

    public function action_insert_data()
    {
        if (isset($_POST,
            $_POST['start_year'],
            $_POST['url'],
            $_POST['description']
        )) {

            $start_year = $_POST['start_year'];
            $url = $_POST['url'];
            $description = $_POST['description'];
            $creator = $_SESSION['user_id'];
            if (isset($_POST['create_portfolio']) && filter_var($url, FILTER_VALIDATE_URL)) {
                $this->model->insert_data(
                    "portfolio",
                    "start_year, url, description, creator_id",
                    "'$start_year', '$url', '$description', '$creator'"
                );
                header("Location: /edit_portfolio");
            } else {
                echo 'Введены неверные данные <br> <a href="javascript:history.back()">Вернуться</a>';
            }
        }
    }

    public function action_del_data()
    {
        if (isset($_POST, $_POST['del_portfolio'])  && isset($_SESSION['isAdmin']) == true) {
            $this->model->delete_data('portfolio', $_POST['del_id']);
            header('Location: /edit_portfolio');
        }
    }

    public function action_update_data()
    {
        if (isset($_POST,
            $_POST['update_start_year'],
            $_POST['update_url'],
            $_POST['update_description'],
            $_POST['update_id']
        ) && isset($_SESSION['isAdmin']) == true) {

            $update_start_year = $_POST['update_start_year'];
            $update_url = $_POST['update_url'];
            $update_description = $_POST['update_description'];
            $update_id = $_POST['update_id'];

            $old = $this->model->old_data($update_id)->fetch_array();

            if ($update_start_year == NULL) {
                $update_start_year = $old['start_year'];
            }
            if ($update_url == NULL) {
                $update_url = $old['url'];
            }
            if ($update_description == NULL) {
                $update_description = $old['description'];
            }
            if ($_POST['update_portfolio']) {
                $this->model->update_data(
                    "portfolio",
                    "start_year = '$update_start_year', url = '$update_url', description = '$update_description' ",
                    $update_id
                );
                header('Location: /edit_portfolio');
            }
        }
    }
}