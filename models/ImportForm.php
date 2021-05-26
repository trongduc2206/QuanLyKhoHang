<?php
    class ImportForm extends Good{
        public string $id='';
        public string $name='';
        public string $type='';
        public string $status='';
        public string $import_date='';
        public string $description='';
        public string $quantity='';
        public string $merchant_id='';
        public string $partner_id='';
        public function rules():array{
            return [
                'name' => [self::RULE_REQUIRED],
                'type' => [self::RULE_REQUIRED],
                'import_date' => [self::RULE_REQUIRED],
                'description' => [self::RULE_REQUIRED],
                'quantity' => [self::RULE_REQUIRED, self::RULE_NUMBER],
                'partner_id' => [self::RULE_REQUIRED],
                'import_date' => [self::RULE_REQUIRED],
            ];
        }

        public function labels():array{
            return [
                'name' => 'Name',
                'type' => 'Type',
                'status' => 'Status',
                'import_date' => 'Import Date',
                'description' => 'Description',
                'quantity' => 'Quantity',
                'id' => 'ID'
            ];
        }
        public function attributes(): array
    {
        return ['name','type', 'status', 'description', 'import_date', 'quantity', 'merchant_id', 'partner_id'];
    }


        public function save(){
            // echo "here";
            $this->merchant_id = Application::$app->session->get('user');
            $partners= $this->getPartnerList();
            // var_dump($this);
            foreach($partners as $key=>$partner){
                if($partner['name'] === $this->partner_id){
                    $this->partner_id= $partner['id'];
                }
            }
            $this->status='Đã nhập';
            return parent::save();
        }


        public function addImportGood(){
            // echo "in save func";
            return $this->save();
        }

        public function deleteGoodById($id){
            return $this->deleteById($id);
        }
    }
?>