<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/Good.php';
require_once '../models/ImportForm.php';

    class DataController extends Controller {
        public function getImportGood(Request $request, Response $response){
            $good = new ImportForm();
            $data = $this->paginationData($request,$good->showImportGood()); 
            $partner = $good->getPartnerList();
            $importGoodNum = $good->getImportGoodNum();
            $path = $request -> getPath();
            $query = $request -> getQuery(); var_dump($query);
            $invalid = false;
            // var_dump($data);
           
            if($request->isPost()){
                var_dump($request->getBody());
                $good->loadData($request->getBody());
                if($good->validate() && $good->addImportGood()){
                $response->redirect("/import?page=".$query["page"]);
                return ;
                } else {
                    $invalid=true;
                }
            } 
            $params = [
                'good' => $data,
                'model' => $good,
                'partner' => $partner,
                'invalid' => $invalid,
                'importGoodNum' => $importGoodNum,
                'path' => $path,
                'query' => $query
            ]; 
            return $this->render('import', $params);
            
        }
        public function paginationData(Request $request, $data){
            $query = $request -> getQuery();
            $pagination = [];
            $cnt =1 ;
            foreach($data as $key => $item){
                $page = ceil($cnt/10);
                $pagination[$page][$key]= $item;
                $cnt++;
            }
            return $pagination;
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
    }
?>