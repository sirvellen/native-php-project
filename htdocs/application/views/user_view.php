<table>
    <tr><td>id</td><td>имя</td><td>email</td></tr>
<?php
foreach($data as $row)
{
    echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>'.$row['email'].'</tr>';
}
?>
</table>
