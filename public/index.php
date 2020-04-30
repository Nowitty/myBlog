<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\App;

$app = new App();

$app->get('/', function() {
    return App::render('show.phtml', ['title' => 'HOW HOW HOW']);
});

$app->run();




