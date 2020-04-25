<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Registration;

$user = [
    'name' => $_POST['name'],
    'password' => $_POST['password'],
];

$reg = new Registration($user['name'], $user['password']);
$reg->save();

header('Location: /');
exit;

?>
