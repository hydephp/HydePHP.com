<?php

// A simple script to test the build process was successful (called by a GitHub action)

chdir(__DIR__ . '/..');

$routes = (function (): array {
    $list = shell_exec('php hyde route:list');
    $routes = explode("\n", trim($list));

    // Unset table structure elements
    array_shift($routes);
    array_shift($routes);
    array_shift($routes);
    array_pop($routes);
    $routes = array_values($routes);

    // Parse routes
    return array_map(function ($route) {
        $cells = explode('|', trim($route, '|'));
        $path = trim($cells[2]);

        // Replace prefix of docs/ with _site/
        return '_site/' . substr($path, 5);
    }, $routes);
})();

/** @deprecated */
function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}
