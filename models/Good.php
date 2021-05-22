<?php
require_once '../core/DbModel.php';
class Good extends DbModel{
    private const QUERY_IMPORT = "select good.* , partner.name as partnername from good, partner where good.status='Đã nhập' and good.partner_id=partner.id and merchant_id=1;
    ";
    private const QUERY_EXPORT = "select good.*, partner.name as partnername from good, partner where good.status='Đã xuất' and good.partner_id=partner.id and merchant_id=1";

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
        return ['name','type', 'status', 'description', 'import_date', 'export_date', 'quantity'];
    }

    public function showListGood(){
        // var_dump($this->getAllData());
        return $this->getAllData();
    }

    public function showImportGood(){
        return $this->queryCustom(self::QUERY_IMPORT);
    }

 }
?>