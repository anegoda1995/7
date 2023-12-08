<?php

require_once 'Router.php';

$router = new Router();

$router->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

