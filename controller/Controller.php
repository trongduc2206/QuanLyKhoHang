<html>
<?php
include_once("model/Model.php");
class Controller{
    public function __construct()
    {

        $this->model = new Model();

    }
    public function invoke(){
        
        if(isset($_POST['stock'])){
            $stock = $this -> model -> getStock($_POST['stock']);
            include 'view/search.php';
        } else {
            $stock = $this -> model -> getStockList();
            include 'view/home.php';
        }
    }
}
?>
</html>
