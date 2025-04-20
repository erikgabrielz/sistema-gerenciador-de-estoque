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

    public function add($supplier){
        $response = false;

        $sql = $this->connect->prepare("INSERT INTO suppliers VALUES (default, :supplier)");
        $sql->bindValue(":supplier", $supplier);

        if($sql->execute()){
            $response = true;
        }

        return $response;
    }

    public function delete($id){
        $response = false;

        $sql = $this->connect->prepare("SELECT id FROM suppliers WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->connect->prepare("DELETE FROM supplier WHERE id = :id");
            $sql->bindParam(":id", $id);
            
            if($sql->execute()){
                $response = true;
            }
        }

        return $response;
    }
    
}