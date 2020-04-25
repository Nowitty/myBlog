<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Database;

$article = [
    'name' => $_POST['name'],
    'body' => $_POST['body'],
];

$db = new Database();

if (isset($_POST['id'])) {
    $db->update($_POST['id'], $article);
} else {
    $db->insert($article);  
}

header('Location: /');
exit;

?>
