<?php
class Model_Portfolio extends Model
{
	public function get_data()
	{
//		$Year = filter_var(trim($_POST['year']), FILTER_SANITIZE_STRING);
//		$Url = filter_var(trim($_POST['url']), FILTER_SANITIZE_STRING);
//		$Description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);

		$query = 'SELECT * FROM portfolio';
		$data = mysqli_query($this->link, $query);
		return $data;
//
//		$mysql -> query("INSERT INTO `portfolio`(
//			`Year`,
//			`Url`,
//			`Description`
//		) VALUES(
//			'$Year',
//			'$Url',
//			'$Description')") or die("Ошибка");
//			$mysql -> close();
//			 exit();

	}
}

?>
