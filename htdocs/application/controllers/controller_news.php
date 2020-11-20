<?php
class Controller_News extends Controller
{
    function __construct()
    {
        $this->model = new Model_News();
        $this->view = new View();
    }

    function action_index()
    {
        $news = $this->model->get_news();
        $this->view->generate('news_view.php', 'template_view.php', $news);
    }

    function action_Page()
    {
        $request = $_GET['id'];
        $comments = $this->model->get_comments($request);
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
            if (isset($_POST['author']) == isset($_SESSION['user_id']) || $_SESSION['isAdmin'] == true) {
                $title = $_POST['title'];
                $date = trim($_POST['date']);
                $text = $_POST['text'];
                $id = $_POST['id'];
                $this->model->edit($title, $date, $text, $id);
            }
            else {
                header('Location: /');
            }
        }
        header('Location: /news/index');
    }

    function action_comments()
    {
        if(isset($_POST['way'])){
            $way = $_POST['way'];
            if (isset($_POST['author']) && isset($_POST['new_id']) && isset($_POST['text']))
            {
                $author = $_POST['author'];
                $new_id = intval($_POST['new_id']);
                $text = $_POST['text'];
                $date = $_POST['date'];

                $this->model->AddComment($author, $text, $new_id, $date);
            }
        }
        header('Location:'.$way);
    }

    function action_add()
    {
        if (isset($_POST['title']) && isset($_POST['create_time']) && isset($_POST['text']) && isset($_POST['author']))
        {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $author = $_POST['author'];
            $date =  $_POST['create_time'];

            $this->model->add($title, $date, $text, $author);
        }
        header('Location: /news/index/');
    }

    function action_CommentDelete()
    {
        if(isset($_POST['way'])){
            $way = $_POST['way'];
            if(isset($_POST['author']) == $_SESSION['user_id'] || $_SESSION['isAdmin'] == true && isset($_POST['id']))
            {
                $author = $_POST['author'];
                $id = $_POST['id'];

                $this->model->CommentDelete($author, $id);
            }

        }
        header('Location:'. $way);
    }
    function action_CommentEdit()
    {
        if(isset($_POST['way'])){
            $way = $_POST['way'];
            if(isset($_POST['author']) == $_SESSION['user_id'] || $_SESSION['isAdmin'] == true && isset($_POST['id'])
                && isset($_POST['comment']))
            {
                $author = $_POST['author'];
                $id = $_POST['id'];
                $comment = $_POST['comment'];

                $this->model->CommentEdit($author, $id, $comment);
            }

        }
        header('Location:'. $way);
    }

    function action_delete()
    {
        if(isset($_GET['author']) && isset($_GET['id']) == $_SESSION['user_id'] || $_SESSION['isAdmin'] == true)
        {
            $author = $_GET['author'];
            $id = $_GET['id'];

            $this->model->delete($author, $id);
        }
        header('Location: /news/index');
    }
}
?>