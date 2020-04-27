<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\User;

session_start();

if (isset($_SESSION['auth'])) {
    header('Location: /');
    exit;
}

if (isset($_POST['name'])) {
    $user = new User();
    if ($user->check()) {
        $user->auth();
        header('Location: /');
        exit;
    } else {
        echo "<div class='container'>Неверное имя пользователя или пароль</div>";
    }
}
?>

<style>
    <?php include dirname(__DIR__) . '/css/style.css'; ?>
</style>

<form method="post">
  <div class="container">
    <h1>Enter</h1>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>

    <button type="submit" class="registerbtn">Register</button>
  </div>
</form>
