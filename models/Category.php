<?php

class Category extends Model{

    public function getCategory($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM categories");

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