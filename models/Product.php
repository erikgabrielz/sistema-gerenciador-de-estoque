<?php

class Product extends Model{

    public function getProduct($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM products");

        if(!empty($id)){
            $sql = $sql." WHERE id = ".$id;
        }

        $sql->execute();
    
        if($sql->rowCount() > 0){
            $response = $sql->fetchAll();
        }
    
        return $response;
    }

}