<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = new Comet\Comet();

$app->get('/',
    function ($request, $response) {
        return $response
            ->with("index.php");
    });

$app->run();

