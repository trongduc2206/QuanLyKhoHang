<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../models/Good.php';
    class SiteController extends Controller {
        public function home(){
            if(Application::$app->isGuest()){
                $this->setLayout('greet');
                return $this->render('greeting');
            } else {
                $good = new Good();
            $data = $good->showListGood();
            $numOfGood = $good ->getGoodNumber();
            $numOfImport = $good ->getImportGoodNum();
            $numOfExport = $good -> getExportGoodNum();
            $numOfPartner = $good -> getPartnerNum();
            // var_dump($data);
            $params = [
                'good' => $data,
                'numOfGood' => $numOfGood,
                'numOfImport' => $numOfImport,
                'numOfExport' => $numOfExport,
                'numOfPartner' => $numOfPartner
            ]; 
            return $this->render('home', $params);
            }
        }
        public function handleHome(Request $request){
           $body = $request -> getBody();
        }
    }
?>