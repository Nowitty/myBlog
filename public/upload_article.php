<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Article;

session_start();

$articleParams = [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'author_id' => $_SESSION['user']['id']
];
echo '<pre>';
$article = new Article();

if (isset($_POST['id'])) {
    $article->update($_POST['id']);
} else {
    $article->add($articleParams);  
}

//header('Location: /');
exit;

?>
