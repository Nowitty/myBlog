<?php
session_start();
var_dump($_SESSION);
?>
<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<div class="top">
    <?php if (!isset($_SESSION['user'])):?>
    <a href="/auth.php">Вход</a>
    <a href="/new_user.php">Регистрация</a>
    <?php else: ?> 
    <a><?= $_SESSION['user']['name']?></a>
    <a href="/?logout">Выход</a>
    <?php endif?>
    <a href="/new_article.php"> Новая статья </a>
</div>

<form action="/upload_article.php" method="post">
    <p><b>Название вашей статьи</b></p>
    <p><textarea rows="2" cols="45" name="title"></textarea></p>
    <p><b>Ваша статья</b></p>
    <p><textarea rows="10" cols="45" name="body"></textarea></p>
    <p><input type="submit" value="Отправить"></p>
</form>
