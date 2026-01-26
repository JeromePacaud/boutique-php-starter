<?php
class Router
{
    private array $routes = [];

    public function get(string $path, callable $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, callable $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            $action();
        } else {
            http_response_code(404);
            echo "Page non trouvée";
        }
    }
}

