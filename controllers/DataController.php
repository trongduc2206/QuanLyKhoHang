<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/Good.php';
require_once '../models/ImportForm.php';
require_once '../models/SearchForm.php';

    class DataController extends Controller {
        public function getImportGood(Request $request, Response $response){
            $good = new ImportForm();
            $data = $good->showImportGood();
            $partner = $good->getPartnerList();
            $invalid = false;
            //var_dump($data);
           
            if($request->isPost()){
                var_dump($request->getBody());
                $good->loadData($request->getBody());
                if($good->validate() && $good->addImportGood()){
                $response->redirect("/import");
                return ;
                } else {
                    $invalid=true;
                }
            } 
            $params = [
                'good' => $data,
                'model' => $good,
                'partner' => $partner,
                'invalid' => $invalid
            ]; 
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

        public function search(Request $request, Response $response){
            $searchForm = new SearchForm();
            $data = $searchForm->showImportGood();
            $partner = $searchForm->getPartnerList();
            
            if($request->isPost()){
                //$name = isset($_POST['name']) ? $_POST['name'] : '';
                //var_dump($_POST['name']);
                //$data = $searchForm->searchByName($name);
                echo "alkfhsdkulfhalkfa";
                $searchForm->loadData($request->getBody());
                $data = $searchForm->searchByName();
                $response->redirect('/search');
                return;
            } 

            $params = [
                'good' => $data,
                'model' => $searchForm,
                'partner' => $partner
            ]; 

            
            return $this->render('search', $params);
        }

        public function delete(Request $request, Response $response){
            $deleteForm = new ImportForm();
            $data = $deleteForm->showImportGood();
            $partner = $deleteForm->getPartnerList();
            
            if(isset($_GET['id'])){
                $data = $deleteForm->deleteGoodById($_GET['id']);
                $response->redirect('/delete');
                return;
            } 

            $params = [
                'good' => $data,
                'model' => $deleteForm,
                'partner' => $partner
            ]; 

            
            return $this->render('delete', $params);

        }
    }
?>
