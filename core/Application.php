<?php
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';
require_once 'Controller.php';
require_once 'Database.php';
require_once 'Session.php';

class Application 
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public static Application $app;
    public Controller $controller;
    public function __construct(array $config)
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
        $this->session = new Session();
    }
   
    public function run(){
       echo $this->router->resolve();
    }
    
    public function getController(){
        return $this->controller;
    }

    public function setController(Controller $controller){
        $this->controller= $controller;
    }
}
?>