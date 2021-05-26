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
        $data = $this->paginationData($request,$good->showImportGood()); 
        $partner = $good->getPartnerList();
        $importGoodNum = $good->getImportGoodNum();
        // echo '<pre>';
        // echo var_dump($importGoodNum);
        // echo '</pre>';
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

    public function getExportGood(Request $request, Response $response){
        $export_good = new ExportForm();
        $import_good = new ImportForm();
        //$data = $good->showAllGood();
        $data = $this->paginationData($request,$export_good->showExportGood()); 
        $addition_data = $import_good->showImportGood();
        $exportGoodNum = $export_good->getExportGoodNum();
        $path = $request -> getPath();
        $query = $request -> getQuery(); var_dump($query);
        $invalid = false;
        // var_dump($data);
        if($request->isPost()){ 
            $export_good->loadData($request->getBody());
            // echo '<pre>';
            // echo var_dump($good);
            // echo '</pre>';  
            if($export_good->validate()) {
                $export_good->updateExportGood();
                $response->redirect("/export");
                return;
            } else 
                $invalid = true;
        } 
        $params = [
            'export_good' => $data,
            'import_good' => $addition_data,
            'path' => $path,
            'query' => $query,
            'exportGoodNum' => $exportGoodNum,
            'invalid' => $invalid
        ]; 
        
        return $this->render('export', $params);
        
    }

    public function getPartner(Request $request, Response $response){
        $partner = new Partner();
        $data = $this->paginationData($request,$partner->getAllData());
        $invalid = false;
        $partnerNum = $partner->getPartnerNum();
        $path = $request -> getPath();
        $query = $request -> getQuery();
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
            'model' => $partner,
            'partnerNum' => $partnerNum,
            'path' => $path,
            'query' => $query
        ]; 
        
        return $this->render('partner', $params);
    }
}
