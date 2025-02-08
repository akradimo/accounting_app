<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $this->matchPath($route['path'], $requestUri)) {
                $handler = $route['handler'];
                $controller = $handler[0];
                $method = $handler[1];
                $params = $this->extractParams($route['path'], $requestUri);

                call_user_func_array([$controller, $method], $params);
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }

    private function matchPath($routePath, $requestUri) {
        $routePath = preg_replace('/\{.*?\}/', '([^/]+)', $routePath);
        return preg_match("#^$routePath$#", $requestUri);
    }

    private function extractParams($routePath, $requestUri) {
        $routePath = preg_replace('/\{.*?\}/', '([^/]+)', $routePath);
        preg_match("#^$routePath$#", $requestUri, $matches);
        array_shift($matches);
        return $matches;
    }
}