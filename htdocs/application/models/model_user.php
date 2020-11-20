<?php

class Model_User extends Model
{
    public function get_data()
    {
        $query = 'SELECT * FROM users';

        $data = mysqli_query($this->link, $query);
        return $data;
    }

    public function login($login, $password)
    {
        $query = "SELECT * FROM `users` WHERE `username` = '$login' 
                        AND `password` = '" . md5($password) . "' LIMIT 1";
        $user = mysqli_query($this->link, $query)->fetch_array();

        if ($user != NULL) {
            return $user;
        }
            return NULL;
    }
    public function EditRole($role, $id, $email)
    {
        if ($email != false) {
            $query = "UPDATE `users` SET `role` = '$role', `email` = '$email' WHERE id = '$id'";
            $result = mysqli_query($this->link, $query);
        }
        else {
        $query = "UPDATE `users` SET `role` = '$role' WHERE id = '$id'";
        $result = mysqli_query($this->link, $query);
        }
        return $result;
    }

    public function delete($id)
    {
        $query = "DELETE FROM `users` WHERE id = '$id'";
        $result = mysqli_query($this->link, $query);
        return $result;
    }
    public function registration($login, $email, $password)
    {
        if(!empty($password)){$password = md5($password);}
        if (!empty($login)&&!empty($email)&&!empty($password)){
            $query = "INSERT INTO users (`username`, `email`, `password`, `role`) VALUES ('$login', '$email', '$password', 'user')";
            $result = mysqli_query($this->link, $query);
            return $result;
        }
        else
        {
            header('Location:/User/registration');
        }
    }

    public function getLogin() {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }
}
