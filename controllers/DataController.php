<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/Good.php';
require_once '../models/ImportForm.php';

    class DataController extends Controller {
        public function getImportGood(Request $request, Response $response){
            $good = new ImportForm();
            $data = $good->showImportGood();
            $partner = $good->getPartnerList();
            // var_dump($data);
            $params = [
                'good' => $data,
                'model' => $good,
                'partner' => $partner
            ]; 
            if($request->isPost()){
                var_dump($request->getBody());
                $good->loadData($request->getBody());
                if($good->validate() && $good->addImportGood()){
                $response->redirect("/import");
                return ;
                }
            } else if($request->isPut()){
                var_dump($request->getBody());
            }
            return $this->render('import', $params);
            
        }

        public function addImportGood(Request $request, Response $response){
            $good = new ImportForm();
            $good->loadData($request->getBody());
            if($good->validate()&& $good->addImportGood()){
                $response->redirect("/import");
                return ;
            }
        }

        public function getExportGood(){
            $good = new Good();
            $data = $good->showExportGood();
            // var_dump($data);
            $params = [
                'good' => $data
            ]; 
            
            return $this->render('export', $params);
            
        }

        public function getPartner(){
            echo "<h1>Partner</h1>";
        }

        public function search(){
            echo "<h1>Search</h1>";
        }

        public function delete(){
            echo "<h1>Delete</h1>";
        }
    }
?>