<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/User.php';
require_once '../models/LoginForm.php';
class AuthController extends Controller{
    public function login(Request $request, Response $response){
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate()&& $loginForm->login()){
                echo '<script>alert("Login successfully")</script>';
                $response->redirect('/');
                return ;
            }
        }
        $this->setLayout('auth');
        // var_dump($this->layout);
        return $this -> render('login',[
            'model' => $loginForm
        ]);
    }

    public function register(Request $request){
        $registerModel = new User();
        if($request->isPost()){
            
            $registerModel->loadData($request->getBody());
            // var_dump($registerModel);

            if($registerModel->validate() && $registerModel->register()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                echo '<script>alert("Thanks for registering")</script>';
                Application::$app->response->redirect('/');
                exit;
            }
            var_dump($registerModel->errors);
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this -> render('register',[
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response){
        Application::$app->logout();
        $response -> redirect('/');
    }
}
?>