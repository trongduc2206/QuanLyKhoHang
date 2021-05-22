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

    public function findMany($what,$where){
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
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function prepare($sql){
        return  Application::$app->db->pdo->prepare($sql);

    }
}
?>