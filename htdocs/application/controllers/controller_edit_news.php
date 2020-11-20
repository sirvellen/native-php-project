<?php
class Controller_Edit_News extends Controller
{
    function __construct()
    {
        $this->model = new Model_Edit_News();
        $this->view = new View();
    }

    function action_index()
    {
        $news = $this->model->get_news();
        $this->view->generate('edit_news_view.php', 'template_view.php', $news);
    }

    function action_Page()
    {
        $comments = $this->model->get_comments();
        $this->view->generate('news_page_view.php', 'template_view.php', $comments);
    }

    function action_addPage()
    {
        $this->view->generate('news_redact.php', 'template_view.php');
    }

    function action_editPage()
    {
        $this->view->generate('news_edit_view.php', 'template_view.php');
    }



    function action_edit()
    {
        if (isset($_POST['id']) || isset($_POST['title']) || isset($_POST['date']) || isset($_POST['text']))
        {
            $title = filter_var(trim($_POST['title'], FILTER_SANITIZE_STRING));
            $date = filter_var(trim($_POST['date'], FILTER_SANITIZE_STRING));
            $text = filter_var(trim($_POST['text'], FILTER_SANITIZE_STRING));
            $id = $_POST['id'];

            $this->model->edit($title, $date, $text, $id);
        }
        header('Location: /news/index');
    }

    function action_comments()
    {
        if(isset($_POST['way'])){
            $way = $_POST['way'];
            if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['text']))
            {
                $author = $_POST['author'];
                $title = $_POST['title'];
                $text = $_POST['text'];

                $this->model->AddComent($author, $title, $text);
            }
        }
        header('Location:'.$way);
    }

    function action_add()
    {
        if (isset($_POST['title']) && isset($_POST['date']) && isset($_POST['text']) && isset($_POST['author']))
        {
            $title = filter_var(trim($_POST['title'], FILTER_SANITIZE_STRING));
            $text = filter_var(trim($_POST['text'], FILTER_SANITIZE_STRING));
            $author = filter_var(trim($_POST['author'], FILTER_SANITIZE_STRING));
            $date =  filter_var(trim($_POST['date'], FILTER_SANITIZE_STRING));

            $this->model->add($title, $date, $text, $author);
        }
        header('Location: /news/index/');
    }

    function action_CommentDelete()
    {
        if(isset($_POST['way'])){
            echo $way = $_POST['way'];
            if(isset($_POST['author']) && isset($_POST['id']))
            {
                $author = filter_var(trim($_POST['author'], FILTER_SANITIZE_STRING));
                $id = $_POST['id'];

                $this->model->CommentDelete($author, $id);
            }

        }
        header('Location:'.$way);
    }

    function action_delete()
    {
        if(isset($_GET['author']) && isset($_GET['id']))
        {
            $author = filter_var(trim($_GET['author'], FILTER_SANITIZE_STRING));
            $id = $_GET['id'];

            $this->model->delete($author, $id);
        }
        header('Location: /news/index');
    }
    public function action_insert_data()
    {
        if (isset($_POST,
            $_POST['start_year'],
            $_POST['title'],
            $_POST['text']
        )) {

            $start_year = $_POST['start_year'];
            $url = $_POST['title'];
            $description = $_POST['text'];
            $creator = $_SESSION['user_id'];
            if (isset($_POST['create_new'])) {
                $this->model->insert_data(
                    "news",
                    "create_time, title, text, creator_id",
                    "'$start_year', '$url', '$description', '$creator'"
                );
                header("Location: /edit_news");
            }
        }
    }

    public function action_del_data()
    {
        if (isset($_POST['del_id'])) {
            $this->model->delete_data('news', $_POST['del_id']);
            header('Location: /edit_news');
        }
    }

    public function action_update_data()
    {
        if (isset($_POST,
            $_POST['edit_title'],
            $_POST['edit_text'],
            $_POST['edit_create_time'],
            $_POST['id']
        ) && isset($_SESSION['isAdmin']) == true || $_POST['id'] == $_SESSION['user_id']) {

            $update_title = $_POST['edit_title'];
            $update_text = $_POST['edit_text'];
            $update_create_time = $_POST['edit_create_time'];
            $update_id = $_POST['id'];

            $old = $this->model->old_data($update_id)->fetch_array();

            if ($update_title == NULL) {
                $update_title = $old['title'];
            }
            if ($update_text == NULL) {
                $update_text = $old['text'];
            }
            if ($update_create_time == NULL) {
                $update_create_time = $old['create_time'];
            }
            if ($_POST['update_news']) {
                $this->model->update_data(
                    "news",
                    "title = '$update_title', text = '$update_text', create_time = '$update_create_time' ",
                    $update_id
                );
                header('Location:/edit_news');
            }
        }
    }
}
?>