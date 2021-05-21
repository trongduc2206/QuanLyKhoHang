<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
    class SiteController extends Controller {
        public function home(){
            $params = [
                'ADK' => 'Công ty demo'
            ]; 
            return $this->render('home', $params);
        }
        public function handleHome(Request $request){
           $body = $request -> getBody();
        }
    }
?>