<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Article;
use App\User;

session_start();
$article = new Article();
$user = new User();
if (!isset($_GET['id'])) {
    header('Location: /');
}
$articleParams = $article->getById($_GET['id']);

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
    <a href="/new_article.php"> Новая статья </a>
    <?php endif?>
</div>

<div class="article">
    <h3><?= $articleParams['title'] ?></h3>
    <p><?= $articleParams['body'] ?></p>
</div>

<a href="/">Back</a>
<?php if ($_SESSION['user']['id'] == $articleParams['author_id'] && isset($_SESSION['user'])):?>
<a href="/update.php/?id=<?=$articleParams['id']?>" method="get">
    <p>Редактировать статью</p>
</a>
<form action="/delete_article.php" method="get">
    <input type="hidden" name="id" value="<?=$articleParams['id']?>">
    <input type="submit" value="Удалить статью">
</form>
<?php endif ?>

