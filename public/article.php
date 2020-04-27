<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Article;
use App\User;

session_start();
$article = new Article();
$user = new User();
if (isset($_GET['id'])) {
    $id = $_GET['id'];    
} else {
    throw new \Exception('something went wrong');
}
$articleParams = $article->getArticleById($id);
if (isset($_SESSION['name'])) {
    $userId = $user->getUserId($_SESSION['name']);
} else {
    $userId = null;
}

?>

<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<div class="top">
    <?php if (!isset($_SESSION['name'])):?>
    <a href="/auth.php">Вход</a>
    <a href="/new_user.php">Регистрация</a>
    <?php else: ?> 
    <a><?= $_SESSION['name']?></a>
    <a href="/new_article.php"> Новая статья </a>
    <?php endif?>
</div>

<div class="article">
    <h3><?= $articleParams['title'] ?></h3>
    <p><?= $articleParams['body'] ?></p>
</div>

<a href="/">Back</a>
<?php if ($userId == $articleParams['author_id'] && isset($_SESSION['auth'])):?>
<a href="/update.php/?id=<?=$articleParams['id']?>" method="get">
    <p>Редактировать статью</p>
</a>
<form action="/delete_article.php" method="get">
    <input type="hidden" name="id" value="<?=$articleParams['id']?>">
    <input type="submit" value="Удалить статью">
</form>
<?php endif ?>

