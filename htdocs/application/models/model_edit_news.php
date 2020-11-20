<?php
class Model_Edit_News extends Model
{
    public function get_news()
    {
        return mysqli_query($this -> link, "SELECT * FROM news");
    }

    public function insert_data($name_table, $table_params, $values)
    {
        $res = mysqli_query($this->link, "INSERT INTO `$name_table` ($table_params) VALUES($values)");
        if (!$res) {
            die(mysqli_error($this->link));
        }
    }

    public function delete_data($name_table, $elem_id)
    {
        $query = "DELETE FROM `$name_table` WHERE id = $elem_id";
        $res = mysqli_query($this->link, $query);
        var_dump($query);
        die();
        if (!$res) {
            die(mysqli_error($this->link));
        }
    }

    public function old_data($name_row)
    {
        $query = 'SELECT * FROM news where id = ' . $name_row;
        return mysqli_query($this->link, $query);
    }

    public function update_data($name_table, $update_params, $elem_id)
    {
        $query = "UPDATE `$name_table` SET $update_params WHERE id = $elem_id";
        $res = mysqli_query($this->link, $query);
        if (!$res) {
            die(mysqli_error($this->link));
        }
    }
}