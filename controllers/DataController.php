<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../models/Good.php';
    class DataController extends Controller {
        public function getImportGood(){
            $good = new Good();
            $data = $good->showImportGood();
            var_dump($data);
            $params = [
                'good' => $data
            ]; 
            
            return $this->render('import', $params);
            
        }
        public function handleHome(Request $request){
           $body = $request -> getBody();
        }
    }
?>