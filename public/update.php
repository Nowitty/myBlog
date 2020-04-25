<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Database;

$db = new Database();
$id = $_GET['id'];
$article = $db->selectById($id);

?>

<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<form action="/upload_article.php" method="post">
    <input type="hidden" name="id" value="<?=$article['id']?>">
    <p><b>Название вашей статьи</b></p>
    <p><textarea rows="2" cols="45" name="name"><?=$article['name']?></textarea></p>
    <p><b>Ваша статья</b></p>
    <p><textarea rows="10" cols="45" name="body"><?=$article['body']?></textarea></p>
    <p><input type="submit" value="Отправить"></p>
</form>