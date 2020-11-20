<?php
class Model_Contacts extends Model
{
    public function get_data()
    {

    }

    public function msg($author, $date, $text, $email)
    {
        $text = mysqli_escape_string($this->link, $text);
        $query = "INSERT INTO `messages` (`author_id`, `date` ,`text`, `email`) VALUES ('$author', '$date', '$text', '$email')";
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function get_messages()
    {
        $query = 'SELECT * FROM `messages`';
        $result = mysqli_query($this->link, $query);
        return $result;
    }
}
