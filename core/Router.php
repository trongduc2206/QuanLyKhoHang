<?php
require_once 'Application.php';
class Router 
{
    private array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response=$response;
    }
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        if(is_string($callback)){
            return $this->renderView($callback); 
        }
        if(is_array($callback)){        
            Application::$app->controller =new $callback[0]();
            $callback[0] = Application::$app->controller;
            // var_dump($callback);
        }
         return call_user_func($callback, $this->request);
        

    }
    public function renderView($view, $params=[]){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return  str_replace('{{content}}', $viewContent, $layoutContent);
        // return $layoutContent;
    }

    public function renderContent($viewContent){
        $layoutContent = $this->layoutContent();
        return  str_replace('{{content}}', $viewContent, $layoutContent);
        // return $layoutContent;
    }

    public function layoutContent(){
        $controller = Application::$app->getController();
        // var_dump($controller);
        $layout = $controller->layout;
        // var_dump($layout);
        ob_start();
        include_once "../views/layout/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view, $params){
        foreach($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once "../views/$view.php";
        return ob_get_clean();
    }  
}
?>