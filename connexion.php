<?php 

try{
     $bd=new PDO("mysql:host=localhost;dbname=artspace",'root','');

}
catch(exception $ex){
    die($ex.getMessage());
}

?>