<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Database;

session_start();
$db = new Database();
if (isset($_GET['id'])) {
    $id = $_GET['id'];    
} else {
    throw new \Exception('something went wrong');
}

$article = $db->selectById($id);
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
    <?php endif?>
    <a href="/new_article.php"> Новая статья </a>
</div>

<div class="article">
    <h3><?= $article['name'] ?></h3>
    <p><?= $article['body'] ?></p>
</div>

<a href="/">Back</a>

<a href="/update.php/?id=<?=$article['id']?>" method="get">
    <p>Редактировать статью</p>
</a>

<form action="/delete_article.php" method="get">
    <input type="hidden" name="id" value="<?=$article['id']?>">
    <input type="submit" value="Удалить статью">
</form>

