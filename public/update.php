<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Article;

if (isset($_GET['id'])) {
    $id = $_GET['id'];    
} else {
    throw new \Exception('something went wrong');
}
$article = new Article();
$articleParams = $article->getArticleById($id);

?>

<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<form action="/upload_article.php" method="post">
    <input type="hidden" name="id" value="<?=$articleParams['id']?>">
    <p><b>Название вашей статьи</b></p>
    <p><textarea rows="2" cols="45" name="title"><?=$articleParams['title']?></textarea></p>
    <p><b>Ваша статья</b></p>
    <p><textarea rows="10" cols="45" name="body"><?=$articleParams['body']?></textarea></p>
    <p><input type="submit" value="Отправить"></p>
</form>