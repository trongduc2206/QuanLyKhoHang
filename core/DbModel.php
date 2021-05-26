<?php
require_once 'Model.php';
abstract class DbModel extends Model{
    abstract public  function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function save(){
        $tableName = $this->tableName();
        $attributes= $this->attributes();
        $params = array_map(fn($attr)=>":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName(".implode(',',$attributes).") 
            VALUES(".implode(',',$params).")" );
            // var_dump($statement, $params, $attributes);
        foreach($attributes as $attribute){
            $statement -> bindValue(":$attribute", $this->{$attribute});
        }
        // var_dump($statement);
        $statement->execute();
        return true;
    }

    public  function findOne($where){
        $tableName = $this->tableName();
        $attributes = array_keys($where);
       $sql = implode("AND",array_map(fn($attr) => "$attr = :$attr", $attributes));
       $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
       foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
       }
       $statement->execute();
       return $statement->fetchObject(static::class);
    }

    public function getAllData(){
        $tableName = $this-> tableName();
        $sql= "SELECT * FROM $tableName";
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetchAll();

    }

    public function getAllDataOfCurrentUser(){
        $tableName = $this-> tableName();
        $sql = "SELECT * FROM $tableName where merchant_id=" . Application::$app->session->get('user');
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findMany($where){
        $tableName = $this->tableName();
        $attributes = array_keys($where);
       $sql = implode("AND",array_map(fn($attr) => "$attr = :$attr", $attributes));
       $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
       foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
       }
       $statement->execute();
       return $statement->fetchAll();
    }

    public function queryCustom(string $sql){
        $statement = self::prepare($sql);
        // var_dump($statement);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function deleteById($id){
        $tableName = $this->tableName();
        $sql = "DELETE FROM $tableName WHERE id = $id";
        $statement = self::prepare($sql);
        $statement->execute();
        return true;
    }

    public function getTotalNumber($primaryKey){
        $tableName = $this->tableName();
        $sql = "SELECT COUNT($primaryKey) AS COUNT FROM $tableName";
        // var_dump($sql);
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetchAll(); 
    }

    public function getTotalNumberWhere($primaryKey, $where){
        $tableName = $this->tableName();
        $attributes = array_keys($where);  
       $sql = implode(" AND ",array_map(fn($attr) => "$attr = :$attr", $attributes));
       $statement = self::prepare("SELECT COUNT($primaryKey) AS COUNT FROM $tableName WHERE $sql");
       foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
       } 
       $statement->execute();
       return $statement->fetchAll();
    }

    public static function prepare($sql){
        return  Application::$app->db->pdo->prepare($sql);

    }
}
?>