<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../models/User.php';
class AuthController extends Controller{
    public function login(){
        $this->setLayout('auth');
        // var_dump($this->layout);
        return $this -> render('login');
    }

    public function register(Request $request){
        $registerModel = new User();
        if($request->isPost()){
            
            $registerModel->loadData($request->getBody());
            // var_dump($registerModel);

            if($registerModel->validate() && $registerModel->register()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
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
}
?>