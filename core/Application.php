<?php
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';
require_once 'Controller.php';
require_once 'Database.php';
require_once 'Session.php';
require_once 'DbModel.php';

class Application 
{
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;
    public static Application $app;
    public Controller $controller;
    public function __construct(array $config)
    {
        self::$app = $this;
        $this->userClass = $config['userClass'];
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if($primaryValue){
        $primaryKey =(new $this->userClass)->primaryKey();
        
         $this->user = (new $this->userClass)->findOne([$primaryKey => $primaryValue ]);
        } else {
            $this-> user = null;
        }
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

    public function login(DbModel $user){
        $this->user = $user;
        $primaryKey = $user -> primaryKey();
        $primaryValue= $user-> {$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout(){
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(){
        return !self::$app->user;
    }
}
?>