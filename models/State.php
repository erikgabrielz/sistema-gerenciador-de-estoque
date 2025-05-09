<?php

    class State extends Model{

        private $table = "states";

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