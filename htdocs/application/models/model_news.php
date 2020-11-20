<?php
class Model_News extends Model
{
    public function get_news()
    {
        $query = 'SELECT * FROM `news`';
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function add($title, $data ,$text, $author)
    {
        $title = mysqli_escape_string($this->link, $title);
        $text = mysqli_escape_string($this->link, $text);
        $query = "INSERT INTO `news` (`title`, `create_time` ,`text`, `creator_id`) VALUES ('$title', '$data', '$text', '$author')";
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function get_comments($request)
    {
        $query = 'SELECT * FROM `comments` where new_id = ' . $request;
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function AddComment($author, $text, $new_id, $date)
    {
        $text = mysqli_escape_string($this->link, $text);;
        $query = "INSERT INTO `comments` (`author_id`, `comment`, `new_id`, `comment_time`) VALUES ('$author', '$text', '$new_id', '$date')";
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function edit($title, $date, $text, $id)
    {
        $text = mysqli_escape_string($this->link, $text);
        $query = "UPDATE news SET title = '$title', create_time = '$date', text = '$text' WHERE id = '$id'";
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function CommentDelete($author, $id)
    {
        $query = "DELETE FROM `comments` WHERE `id` = '$id' AND `author_id` = '$author'";
        $result = mysqli_query($this->link, $query);
        return $result;
    }
    public function CommentEdit($author, $id, $comment)
    {
        $comment = mysqli_escape_string($this->link, $comment);
        $query = "UPDATE comments SET author_id = '$author', comment = '$comment' WHERE id = '$id'";
        $result = mysqli_query($this->link, $query);
        return $result;
    }

    public function delete($author, $id)
    {
        $query = "DELETE FROM `news` WHERE `id` = '$id'";
        $result = mysqli_query($this->link, $query);
        return $result;
    }
    public function get_author($id) {
        if ($id != NULL) {
            $query = 'SELECT * FROM users where id = ' . $id;
            $author = mysqli_query($this->link, $query)->fetch_array();
            return $author['username'];
        }
    }
}
?>