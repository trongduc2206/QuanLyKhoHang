<?php
require_once '../core/Controller.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once '../models/Good.php';
require_once '../models/ImportForm.php';
require_once '../models/SearchForm.php';
require_once '../models/ExportForm.php';
require_once '../models/Partner.php';

class DataController extends Controller
{
    public function getImportGood(Request $request, Response $response)
    {
        $good = new ImportForm();
        $data = $this->paginationData($request, $good->showImportGood());
        $partner = $good->getImportPartnerList();
        $importGoodNum = $good->getImportGoodNum();

        $path = $request->getPath();
        $query = $request->getQuery();
        // var_dump($query);
        $invalid = false;
        // var_dump($data);

        if ($request->isPost()) {
            // var_dump($request->getBody());
            $good->loadData($request->getBody());
            if ($good->validate() && $good->addImportGood()) {
                $redirect= $query["page"];
                echo "<script>alert('Add Success'); document.location='/import?page=$redirect'</script>";
                // $response->redirect("/import?page=" . $query["page"]);
                return;
            } else {
                $invalid = true;
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

    public function paginationData(Request $request, $data)
    {
        $query = $request->getQuery();
        $pagination = [];
        $cnt = 1;
        foreach ($data as $key => $item) {
            $page = ceil($cnt / 10);
            $pagination[$page][$key] = $item;
            $cnt++;
        }
        return $pagination;
    }

    public function addImportGood(Request $request, Response $response)
    {
        $good = new ImportForm();
        $good->loadData($request->getBody());
        if ($good->validate() && $good->addImportGood()) {
            $response->redirect("/import");
            return;
        }
    }

    public function search(Request $request, Response $response)
    {
        $searchForm = new SearchForm();
        //$data = $this->paginationData($request, $searchForm->getAllData());
        $partner = $searchForm->getPartnerList();
        //$searchGoodNum = $searchForm->getGoodNumber();
        $path = $request->getPath();
        $query = $request->getQuery();
        $data2 = [];
        // var_dump($request->isPost());
        if ($request->isPost()) {
            //var_dump($request->getBody());
            // var_dump($data);
            $searchForm->loadData($request->getBody());
            if ($searchForm->validate()) {
                $data2 = $this->paginationData($request, $searchForm->searchByName());
                $query = $request->getQuery();
                // var_dump($data2);
                $params = [
                    'search' => $data2,
                    'model' => $searchForm,
                    //'searchGoodNum' => $searchGoodNum,
                    'path' => $path,
                    'query' => $query
                ];
                
                if(empty($data2)){
                    $response->redirect('_404');
                } else {
                    return $this->render('search', $params);
                }
            }
        }

        $params = [
            //'good' => $data,
            'model' => $searchForm,
            'partner' => $partner,
            'search' => $data2,
            //'searchGoodNum' => $searchGoodNum,
            'path' => $path,
            'query' => $query
        ];


        return $this->render('search', $params);
    }

    public function delete(Request $request, Response $response)
    {
        $deleteForm = new SearchForm();
        $data = [];
        // $data = $deleteForm->getAllData();
        $partner = $deleteForm->getPartnerList();
        //$deleteGoodNum = $deleteForm->getGoodNumber();
        $path = $request->getPath();
        $query = $request->getQuery();
        $data2 = [];
        $searchQuery ='';
        if ($request->isPost()) {
            // var_dump($request->getBody()); exit; 
            $searchQuery = $request->getBody();
            // var_dump($data);
            $deleteForm->loadData($request->getBody());
            if ($deleteForm->validate()) {
                $data2 = $deleteForm->searchByName();
                $query = $request->getQuery();
                // var_dump($data2);
                $params = [
                    'good' => $data2,
                    'model' => $deleteForm,
                    'partner' => $partner,
                    //'searchGoodNum' => $searchGoodNum,
                    'path' => $path,
                    'query' => $query
                ];
                
                if(empty($data2)){
                    echo "<script>alert('Can not found good with this name');document.location='/manage' </script>";
                } else {
                    return $this->render('delete' , $params);
                }
                // return $this->render('delete' , $params);
            }
        }

        if (isset($_GET['id'])) {
            $query = $request->getQuery(); 
            $id= $query["id"];
            $nameRespponse = $deleteForm-> findNameById($id); 
            if(!empty($nameRespponse)){
            $name = $nameRespponse[0]["name"]; 
            } else {
                $response -> redirect("/manage");
                return ;
            }
            $newDataToLoad = ["name" => $name];
            $deleteForm->loadData($newDataToLoad);
            $data = $deleteForm->deleteGoodById($_GET['id']);
            $data2 = $deleteForm->searchByName();
            // var_dump($data2); 
            
            $params = [
                'good' => $data2,
                'model' => $deleteForm,
                'partner' => $partner,
                //'searchGoodNum' => $searchGoodNum,
                'path' => $path,
                'query' => $query
            ];
            echo "<script>alert('Delete Success'); </script>";
           return  $this->render('delete' , $params);
            // $response->redirect('/delete');
        }

        $params = [
            'good' => $data,
            'model' => $deleteForm,
            'partner' => $partner,
            //'deleteGoodNum' => $deleteGoodNum,
            'path' => $path,
            'query' => $query
        ];


        return $this->render('delete', $params);
    }



    public function getExportGood(Request $request, Response $response)
    {
        $export_good = new ExportForm();
        $import_good = new ImportForm();
        //$data = $good->showAllGood();
        $data = $this->paginationData($request, $export_good->showExportGood());
        $addition_data = $import_good->showImportGood();
        $exportGoodNum = $export_good->getExportGoodNum();
        $path = $request->getPath();
        $query = $request->getQuery();
        // var_dump($query);
        $invalid = false;
        // var_dump($data);
        if ($request->isPost()) {
            $export_good->loadData($request->getBody());
            // echo '<pre>';
            // echo var_dump($good);
            // echo '</pre>';  
            if ($export_good->validate()) {
                $export_good->updateExportGood();
                $redirect= $query["page"];
                echo "<script>alert('Export Success'); document.location='/export?page=$redirect'</script>";
                // $response->redirect("/export?page=" . $query["page"]);
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
            'invalid' => $invalid,
            'model' => $export_good
        ];

        return $this->render('export', $params);
    }

    public function getPartner(Request $request, Response $response)
    {
        $partner = new Partner();
        $data = $this->paginationData($request, $partner->getAllDataOfCurrentUser());
        $invalid = false;
        $partnerNum = $partner->getPartnerNum();
        $path = $request->getPath();
        $query = $request->getQuery();
        // var_dump($data);
        if ($request->isPost()) {
            // echo '<pre>';
            // echo var_dump($request->getBody());
            // echo '</pre>';  
            $partner->loadData($request->getBody());
            // echo '<pre>';
            // echo var_dump($partner);
            // echo '</pre>';  
            if ($partner->validate()) {
                $partner->addPartner();
                $redirect= $query["page"];
                echo "<script>alert('Add Success'); document.location='/partner?page=$redirect'</script>";
                // $response->redirect("/partner");
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
