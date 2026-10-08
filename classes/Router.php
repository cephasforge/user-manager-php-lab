<?php
class Router{
    private array $routes = [];

    public function add(string $method, string $path, callable|array $handler): void{
        $this->routes[] = [$method, $path, $handler];
    }

    /**
     * Find the route matching the current request and run it.
     * Called once from public/index.php.
     */
    public function dispatch(string $method, string $uri): void{
        // Keep only the path, drop the query string
        // "/signin?redirect=home" becomes "/signin"
        $path = parse_url($uri, PHP_URL_PATH);

        // Folder where index.php lives, relative to the web root.
        // Empty if the app is at the root of the domain,
        // "/mon-app/public" if it is installed in a subfolder.
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

        // Remove that folder prefix from the path, then normalize slashes:
        // "/mon-app/public/signin/" becomes "/signin"
        // This way routes work the same locally, on GitHub clones and on a host.
        $path = '/' . trim(substr($path, strlen($base)), '/');

        // Look through all registered routes
        foreach ($this->routes as [$m, $p, $handler]) {

            // A route matches only if BOTH the HTTP method and the path are identical.
            // This lets GET /signin (show form) and POST /signin (process form) coexist.
            if ($m === $method && $p === $path) {
                if (is_array($handler)) {
                    // Controller action: [UserController::class, 'signin']
                    [$class, $action] = $handler;

                    // Create the controller object and call its method.
                    // Same as: (new UserController())->signin();
                    (new $class())->$action();
                } else {
                    // Anonymous function: just call it
                    $handler();
                }
                // Route found and executed, stop here so the 404 below is skipped
                return;
            }
        }

        http_response_code(404);
        echo 'Page not found!';
    }
}