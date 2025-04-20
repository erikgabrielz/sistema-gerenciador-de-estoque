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

    public function add($category){
        $response = false;

        $sql = $this->connect->prepare("INSERT INTO categories VALUES (default, :category)");
        $sql->bindValue(":category", $category);

        if($sql->execute()){
            $response = true;
        }

        return $response;
    }

    public function delete($id){
        $response = false;

        $sql = $this->connect->prepare("SELECT id FROM categories WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->connect->prepare("DELETE FROM categories WHERE id = :id");
            $sql->bindParam(":id", $id);
            
            if($sql->execute()){
                $response = true;
            }
        }

        return $response;
    }
}