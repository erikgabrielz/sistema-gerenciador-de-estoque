<?php

    class State extends Model{

        private $table = "states";

        public function getState($state = ""){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM ".$this->table);
            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetchAll();
            }

            return $response;
        }

        public function add($nome, $sigla){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES (default, :nome, :sigla)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sigla", $sigla);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }