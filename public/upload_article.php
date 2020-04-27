<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Article;

$articleParams = [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'author' => $_POST['author']
];

$article = new Article($articleParams);

if (isset($_POST['id'])) {
    $article->update($_POST['id']);
} else {
    $article->save($article);  
}

header('Location: /');
exit;

?>
