<?php

namespace App;

Class App
{
    private $handlers = [];
    public function get($route, $handler)
    {
        $this->append('GET', $route, $handler);
    }
    public function post($route, $handler)
    {
        $this->append('GET', $route, $handler);
    }
    public function append($method, $route, $handler)
    {
        $this->handlers[] = [$route, $method, $handler];
    }
    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->handlers as $item) {
            [$route, $handlerMethod, $handler] = $item;
            $preparedRoute = preg_quote($route, '/');
            if ($method == $handlerMethod && preg_match("/^$preparedRoute$/i", $uri)) {
                echo $handler();
            }
        }
    }
    public function render($template, $params = [])
    {
        extract($params);
        ob_start();
        include "templates/{$template}";
        print_r(ob_get_clean());
    }
}