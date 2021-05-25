<?php
    class SearchForm extends Good{
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

        public function search($name){
            $good = (new Good)->findOne(['name'=>$this->name]);
            
            return $good;
        }
        
    }
