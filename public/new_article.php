<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<form action="/upload_article.php" method="post">
    <p><b>Название вашей статьи</b></p>
    <p><textarea rows="2" cols="45" name="name"></textarea></p>
    <p><b>Ваша статья</b></p>
    <p><textarea rows="10" cols="45" name="body"></textarea></p>
    <p><input type="submit" value="Отправить"></p>
</form>
