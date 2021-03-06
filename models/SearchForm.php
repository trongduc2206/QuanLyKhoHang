<?php
    class SearchForm extends Good{
        public string $name='';
        public function rules():array{
            return [
                'name' => [self::RULE_REQUIRED],
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

        public function searchByName(){
            $sql = "select good.* , partner.name as partnername from good, partner where 
            good.name= '$this->name' and good.partner_id=partner.id and good.merchant_id=" .Application::$app->session->get('user');
            return $this->queryCustom($sql);
        }
        
        public function getAllData()
        {
            $sql = "select good.* , partner.name as partnername from good, partner where 
            good.partner_id=partner.id and good.merchant_id=" .Application::$app->session->get('user');
            return $this->queryCustom($sql);
        }

        public function deleteGoodById($id){
            return $this->deleteById($id);
        }
    }
