<?php
require_once '../core/Model.php';
require_once '../core/DbModel.php';
class LoginForm extends Model {
    public string $username ='';
    public string $password ='';
    public function rules():array{
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels():array{
        return [
            'username' => 'User Name',
            'password' => 'Password'
        ];
    }

    public function login(){
        $user = (new User)->findOne(['username'=>$this->username]);
        if(!$user){
            $this->addError('username', 'User with this User Name does not exist');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        // var_dump($user);
        return Application::$app->login($user); 
    }
}
?>