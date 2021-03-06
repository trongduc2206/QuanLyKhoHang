<?php
    class ExportForm extends Good{
        public string $id='';
        public string $name='';
        public string $type='';
        public string $status='';
        public string $import_date='';
        public string $export_date='';
        public string $description='';
        public string $quantity='';
        public string $merchant_id='';
        public string $partner_id='';
        public function rules():array{  
            return [
                'export_date' => [self::RULE_REQUIRED,[self::RULE_EXPORT,'import'=>$this->getImportDate()[0]["import_date"]]],
            ];
        }

        public function attributes(): array{
            return ['name','type', 'status', 'description', 'import_date', 'export_date','quantity', 'merchant_id', 'partner_id'];
        }


        public function update(){
            $this->merchant_id = Application::$app->session->get('user');
            $partners= $this->getPartnerList();
            // var_dump($this);
            foreach($partners as $key=>$partner){
                if($partner['name'] === $this->partner_id){
                    $this->partner_id= $partner['id'];
                }
            }
            $this->status='Đã xuất';
            return parent::updateGoodStatus($this->id, $this->export_date);
        }


        public function updateExportGood(){
            // echo "in update func";
            return $this->update();
        }

        public function getImportDate(){
            $sql = "select import_date from good where id=$this->id and merchant_id= ".Application::$app->session->get('user');
            return $this->queryCustom($sql);
        }
    }
