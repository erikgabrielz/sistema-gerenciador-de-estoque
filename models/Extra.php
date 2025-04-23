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

        public function add($extra){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO extras VALUES (default, :extra)");
            $sql->bindValue(":extra", $extra);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }



        public function delete($id){
            $response = false;

            $sql = $this->connect->prepare("SELECT id FROM extras WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $this->connect->prepare("DELETE FROM extras WHERE id = :id");
                $sql->bindParam(":id", $id);

                if($sql->execute()){
                    $response = true;
                }
            }

            return $response;
        }
    }