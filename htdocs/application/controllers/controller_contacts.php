<?php

class Controller_Contacts extends Controller
{
	function __construct()
	{
		$this->model = new Model_Contacts();
		$this->view = new View();
	}
    function action_index()
    {
        $this->view->generate('contacts_view.php', 'template_view.php');
    }

    function action_message()
    {
        if (isset($_POST['author']) || isset($_POST['email']) || isset($_POST['date']) || isset($_POST['text'])) {
            $author = $_POST['author'];
            $date = trim($_POST['date']);
            $text = $_POST['text'];
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);;
            $res = $this->model->msg($author, $date, $text, $email);
            if ($res != NULL) {
                $this->view->generate('contacts_success_view.php', 'template_view.php');
            }
        }
    }

    function action_view()
	{
		$data = $this->model->get_messages();
		$this->view->generate('messages_view.php', 'template_view.php', $data);
	}
}
