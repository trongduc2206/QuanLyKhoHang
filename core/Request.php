<?php
class Request {
    public function getPath(){
        $path= $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if($position === false){
            return $path;
        }
        return $path = substr($path, 0, $position);
    }

    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        return $this->getMethod() === 'get';
    }

    public function isPost(){ 
        return $this->getMethod() === 'post';
    }

    public function isPut(){
        return $this->getMethod() === 'put';
    }

    public function isDelete(){
        return $this->getMethod() === 'delete';
    }

    public function getBody(){
        $body =[];
        if($this-> getMethod()==='get'){
            foreach($_GET as $key => $value){
                $body[$key]= filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this-> getMethod()==='post'){
            foreach($_POST as $key => $value){
                $body[$key]= filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function getQuery(){
        $path= $_SERVER['REQUEST_URI'] ?? '/';
        $position1 = strpos($path,'?');
        if($position1 == false){
            return array("page" => "1");
        }
        $position2 = strpos($path,"=");
        $queryKey = substr($path,$position1+1, $position2-$position1-1);
        $queryValue = substr($path,$position2+1, strlen($path));
        return array($queryKey => $queryValue);
    }
}
?>