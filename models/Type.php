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

    public function add($type){
        $response = false;

        $sql = $this->connect->prepare("INSERT INTO types VALUES (default, :type)");
        $sql->bindValue(":type", $type);

        if($sql->execute()){
            $response = true;
        }

        return $response;
    }

    public function delete($id){
        $response = false;

        $sql = $this->connect->prepare("SELECT id FROM types WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->connect->prepare("DELETE FROM types WHERE id = :id");
            $sql->bindParam(":id", $id);
            
            if($sql->execute()){
                $response = true;
            }
        }

        return $response;
    }
    
}