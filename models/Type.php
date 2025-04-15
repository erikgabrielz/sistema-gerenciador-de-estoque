<?php

class Type extends Model{

    public function getType($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM types");

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