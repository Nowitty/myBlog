<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Database;
// take articles from DB
$db = new Database();
$articles = $db->selectAll();
// check session
session_start();
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
}
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital@1&display=swap');
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<div class="top">
    <?php if (!isset($_SESSION['name'])):?>
    <a href="/auth.php">Вход</a>
    <a href="/new_user.php">Регистрация</a>
    <?php else: ?> 
    <a><?= $_SESSION['name']?></a>
    <a href="/?logout">Выход</a>
    <?php endif?>
    <a href="/new_article.php"> Новая статья </a>
</div>
<div class="one">
    <a href="/"><h1>myBlog</h1></a>
</div>


<?php foreach ($articles as $article): ?>
<div class="article">
<?php if (strlen($article['body']) > 300) {
    $preview = substr($article['body'], 0, 300)."...";
} else {
    $preview = $article['body'];
}
?>
    <a href="/article.php/?id=<?=$article['id']?>">
        <h1><?= $article['name'] ?></h1>
    </a>
    <a href="/article.php/?id=<?=$article['id']?>">
        <p><?= $preview ?></p>
    </a>   
</div>
<?php endforeach ?>

