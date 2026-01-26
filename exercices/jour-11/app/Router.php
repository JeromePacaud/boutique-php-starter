<?php
class Router
{
    private array $routes = [];

    public function get(string $pattern, array $action): void
    {
        // Convertir /produit/{id} en regex /produit/(?P[^/]+)
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';
        $this->routes['GET'][$regex] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $regex => $action) {
            if (preg_match($regex, $path, $matches)) {
                // Extraire les paramètres nommés
                $params = array_filter(
                    $matches,
                    fn($key) => is_string($key),
                    ARRAY_FILTER_USE_KEY
                );

                [$controller, $method] = $action;
                $instance = new $controller();
                $instance->$method(...array_values($params));
                return;
            }
        }
        // 404 si aucune route ne match
        http_response_code(404);
        echo "Page non trouvée";
    }
}
