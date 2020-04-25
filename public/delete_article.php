<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Database;

$id = $_GET['id'];
$db = new Database();

$db->deleteArticle($id);

header('Location: /');
exit;

?>
