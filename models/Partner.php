<?php
require_once '../core/DbModel.php';
class Partner extends DbModel {

    public string $id='';
    public string $name='';
    public string $status='';
    public string $relation='';
    public string $merchant_id='';
    public function labels():array{
        return [
            'name' => 'Name'
        ];
    }

    public function rules():array{
        return [
            'name' => [self::RULE_REQUIRED]
        ];
    }

    public function tableName(): string
    {
        return 'partner';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'status', 'relation', 'merchant_id'];
    }

    public function addPartner() {
        $this->status = "Đang hợp tác";
        $this->merchant_id = Application::$app->session->get('user');
        return parent::save();
    } 

    public function getPartnerNum(){
        return $this->getTotalNumberWhere($this->primaryKey(), ['merchant_id' => Application::$app->session->get('user')]);
    }
}
?>