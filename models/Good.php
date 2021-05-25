<?php
require_once '../core/DbModel.php';
class Good extends DbModel{
   
    private string $QUERY_IMPORT = "select good.* , partner.name as partnername from good, partner where good.status='Đã nhập' and good.partner_id=partner.id and merchant_id=
    ";
    private string $QUERY_EXPORT = "select good.*, partner.name as partnername from good, partner where good.status='Đã xuất' and good.partner_id=partner.id and merchant_id=";

    public function tableName(): string
    {
        return 'good';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules() : array{
        return  [
           
        ];
    }

    public function attributes(): array
    {
        return ['name','type', 'status', 'description', 'import_date', 'export_date', 'quantity', 'merchant_id', 'partner_id'];
    }

    public function showListGood(){
        // var_dump($this->getAllData());
        // var_dump(Application::$app->session->get('user'));
        return $this->findMany(['merchant_id' => Application::$app->session->get('user')]);
    }

    public function showImportGood(){
        $sql= $this->QUERY_IMPORT.Application::$app->session->get('user');
        return $this->queryCustom($sql);
    }

    public function showExportGood(){
        $sql= $this->QUERY_EXPORT.Application::$app->session->get('user');
        return $this->queryCustom($sql);
    }

    public function getPartnerList(){
        $sql= "select distinct partner.* from partner, good where good.partner_id=partner.id and good.merchant_id=". Application::$app->session->get('user');
        return $this->queryCustom($sql);
    }

    public function getGoodNumber(){
        return $this->getTotalNumber($this->primaryKey());
    }

    public function getImportGoodNum(){
        return $this->getTotalNumberWhere($this->primaryKey(), ['status'=>'Đã nhập']);
    }

    public function getExportGoodNum(){
        return $this->getTotalNumberWhere($this->primaryKey(), ['status'=>'Đã xuất']);
    }

    public function getPartnerNum(){
        $partners = $this->getPartnerList();
        $partnerNum =0;
        foreach($partners as $key=>$partner){
            $partnerNum++;
        }
        return $partnerNum;
    }

 }
?>