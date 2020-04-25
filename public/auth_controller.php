<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\User;

$user = new User($_GET['name'], $_GET['password']);

$db = new Database();

if (isset($_POST['id'])) {
    $db->update($_POST['id'], $article);
} else {
    $db->insert($article);  
}

header('Location: /');
exit;

?>