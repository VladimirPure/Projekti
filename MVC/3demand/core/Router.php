<?php

namespace app\core;

class Router
{
    public Request $request;
    public array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback)
        {
            $this->request->redirect("notFound");
        }

        if(is_string($callback))
        {
            return $this->view($callback,"main");
        }

        if(is_array($callback))
        {
            $callback[0]= new $callback[0]();
        }

        return call_user_func($callback);
    }

    public function renderLayout($layout)
    {
        ob_start();
        include_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function renderPartialView($partialView)
    {
        ob_start();
        include_once __DIR__ . "/../views/$partialView.php";
        return ob_get_clean();
    }

    public function view($partialView, $layout)
    {
        $partialViewContent = $this->renderPartialView($partialView);
        $layoutViewContent = $this->renderLayout($layout);

        $view = str_replace("{{ renderBody }}", $partialViewContent,$layoutViewContent);

        echo $view;
    }




    public function viewWithParams($partialView, $layout, $params)
    {
        $partialViewContent = $this->renderPartialViewWithParams($partialView, $params);
        $layoutViewContent = $this->renderLayout($layout);

        $view = str_replace("{{ renderBody }}", $partialViewContent,$layoutViewContent);

        echo $view;
    }

    public function renderPartialViewWithParams($partialView, $params)
    {
        if($params!=null) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include_once __DIR__ . "/../views/$partialView.php";
        return ob_get_clean();
    }

}

