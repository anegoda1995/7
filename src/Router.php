<?php

require_once 'controllers/MainGetController.php';
require_once 'controllers/MainPostController.php';

class Router {
    private array $routes = [
        'GET' => [
            '/' => [
                'controller' => 'MainGetController',
                'action' => 'homepage',
            ],
            '/add-post' => [
                'controller' => 'MainGetController',
                'action' => 'addPostPage',
            ],
            '/list-posts' => [
                'controller' => 'MainGetController',
                'action' => 'listPostsPage',
            ],
            '/post/{id}' => [
                'controller' => 'MainGetController',
                'action' => 'postPage',
            ]
        ],
        'POST' => [
            '/add-post' => [
                'controller' => 'MainPostController',
                'action' => 'addPost',
            ],
        ]
    ];

    public function handle($method, $uri) {
        try {
            $method = strtoupper($method);
            $route = $this->findRoute($method, $uri);
            $controllerName = $route['controller'];
            $actionName = $route['action'];
            $controller = new $controllerName();
            $controller->$actionName();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findRoute($method, $uri) {
        $method = strtoupper($method);
        $route = $this->routes[$method][$uri];

        if ($route) {
            return $route;
        } else {
            throw new Exception('404 Route not found');
        }
    }
}
