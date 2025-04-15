<?php

class Extra extends Model{

    public function getExtra($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM extras");

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