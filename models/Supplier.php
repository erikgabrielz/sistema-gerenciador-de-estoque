<?php

class Supplier extends Model{

    public function getSupplier($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM suppliers");

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