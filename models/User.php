<?php
require_once '../core/Model.php';
require_once '../core/DbModel.php';
class User extends DbModel{
    public string $username = '';
    public string $password= '';
    public string $confirmPassword = '';
    public string $name = '';

    public function tableName(): string
    {
        return 'merchant';
    }

    public function save(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function register(){
        return $this->save();
    }

    public function rules() : array{
        return  [
            'username' => [self::RULE_REQUIRED,[self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match'=>'password']],
            'name' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['username','password', 'name'];
    }
}
?>