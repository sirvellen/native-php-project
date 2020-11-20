<?php if ($_SESSION['isAdmin'] == 'true'): ?>

    <table class="table table-bordered">
        <tr>
            <td><a href="/edit_portfolio">Редактировать портфолио</a></td>
            <td><a href="/user/edit_users">Редактировать пользователей</a></td>
            <td><a href="/edit_news">Редактировать новости</a></td>
        </tr>
    </table>
<?php else:header("Location: /"); ?>
<?php endif; ?>