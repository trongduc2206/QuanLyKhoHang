<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/Good.php';
require_once '../models/ImportForm.php';
require_once '../models/ExportForm.php';
require_once '../models/Partner.php';
class DataController extends Controller {
    public function getImportGood(Request $request, Response $response){
        $good = new ImportForm();
        $data = $good->showImportGood();
        $partner = $good->getPartnerList();
        $invalid = false;
        // var_dump($data);
        
        if($request->isPost()){
            //var_dump($request->getBody());
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

    public function getAllGood(Request $request, Response $response){
        $good = new ExportForm();
        $data = $good->showAllGood();
        $invalid = false;
        // var_dump($data);
        if($request->isPost()){ 
            $good->loadData($request->getBody());
            // echo '<pre>';
            // echo var_dump($good);
            // echo '</pre>';  
            if($good->validate()) {
                $good->updateExportGood();
                $response->redirect("/export");
                return;
            } else 
                $invalid = true;
        } 
        $params = [
            'good' => $data,
            'invalid' => $invalid
        ]; 
        
        return $this->render('export', $params);
        
    }

    public function getPartner(Request $request, Response $response){
        $partner = new Partner();
        $data = $partner->getAllData();
        $invalid = false;
        // var_dump($data);
        if($request->isPost()){
            // echo '<pre>';
            // echo var_dump($request->getBody());
            // echo '</pre>';  
            $partner->loadData($request->getBody());
            // echo '<pre>';
            // echo var_dump($partner);
            // echo '</pre>';  
            if($partner->validate()) {
                $partner->addPartner();
                $response->redirect("/partner");
                return;
            } else 
                $invalid = true;
            
        } 
        $params = [
            'partner' => $data,
            'invalid' => $invalid,
            'model' => $partner
        ]; 
        
        return $this->render('partner', $params);
    }
}
