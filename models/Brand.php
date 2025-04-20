<?php

class Brand extends Model{

    public function getBrand($id = ""){
        $response = false;
    
        $sql = $this->connect->prepare("SELECT * FROM brands");

        if(!empty($id)){
            $sql = $sql." WHERE id = ".$id;
        }

        $sql->execute();
    
        if($sql->rowCount() > 0){
            $response = $sql->fetchAll();
        }
    
        return $response;
    }

    public function add($brand){
        $response = false;

        $sql = $this->connect->prepare("INSERT INTO brand VALUES (default, :brand)");
        $sql->bindValue(":brand", $brand);

        if($sql->execute()){
            $response = true;
        }

        return $response;
    }

    public function delete($id){
        $response = false;

        $sql = $this->connect->prepare("SELECT id FROM brand WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->connect->prepare("DELETE FROM brand WHERE id = :id");
            $sql->bindParam(":id", $id);
            
            if($sql->execute()){
                $response = true;
            }
        }

        return $response;
    }
    
}