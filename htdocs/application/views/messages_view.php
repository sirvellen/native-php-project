<?php
require_once 'application/models/model_news.php';
$author = new Model_News();
foreach ($data as $row){?>
    <table class="table-control">
        <tr>
            <td></td>
            <td><?=$author->get_author($row['author_id'])?></td>
            <td><a href="mailto:<?=$row['email']?>?subject=Ответ%20на%20обращение&amp;body=<?=$row['text']?>"><?=$row['email']?></a></td>
            <td><textarea class="w-100 h-auto" readonly style="resize: none; border: none; outline: none; cursor: default;"><?=$row['text']?></textarea></td>
            <td><?=$row['date']?></td>
        </tr>
    </table>
<?php }