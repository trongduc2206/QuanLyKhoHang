<html>
<?php
include_once("model/Stock.php");
class Model {
    function getStockList(){
            $server = 'localhost';

             $user = 'root';
            
             $pass = 'trongduc22062000';
            
             $mydb = 'xproject';
            
             $table_name = 'item';

             $connect = mysqli_connect($server, $user, $pass, $mydb  );
            if(!$connect){
                die ("Cannot connect to $server using $user"); 
            } else {
                $selectQuery = 'select * from '.$table_name.' limit 10';
                $selectResult = mysqli_query($connect, $selectQuery);
                $stock = array();
                $i=0;
                while ($rows = mysqli_fetch_array($selectResult) ){
                    $stock[$rows["code"]] = new Stock($rows["code"],$rows["name"]);
                    
                }
                return $stock;
            }
            
    }

     function getStock($name){
        $server = 'localhost';

        $user = 'root';
       
        $pass = 'trongduc22062000';
       
        $mydb = 'xproject';
       
        $table_name = 'item';

        $connect = mysqli_connect($server, $user, $pass, $mydb  );
       if(!$connect){
           die ("Cannot connect to $server using $user"); 
       } else {
           $selectQuery = "select * from ".$table_name." where name ='".$name."' limit 10";
           echo $selectQuery;
           $selectResult = mysqli_query($connect, $selectQuery);
           $stock = array();
           if($selectResult){
           while ($rows = mysqli_fetch_array($selectResult) ){
               $stock[$rows["code"]] = new Stock($rows["code"],$rows["name"]);               
           }
        }
           return $stock;
       }
     }

}
?>
</html>