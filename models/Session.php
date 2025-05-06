<?php

    class Session extends Model{

        private $table = "sessions";
        private $join_users = "users";

        public function getSession($token){
            $response = false;

            $sql = $this->connect->prepare("SELECT ".$this->table.".id, user_id, ip, ".$this->join_users.".name, ".$this->join_users.".email, ".$this->join_users.".user, ".$this->join_users.".level, ".$this->join_users.".status FROM ".$this->table." INNER JOIN ".$this->join_users." ON user_id = ".$this->join_users.".id WHERE token = :token AND expire > NOW();");
            $sql->bindValue(":token", $token);

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }

            return $response;
        }



        public function add($user_id, $ip, $token, $expire_at){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO ".$this->table." VALUES (default, :user_id, :ip, :token, default, :expire)");
            $sql->bindValue(":user_id", $user_id);
            $sql->bindValue(":ip", $ip);
            $sql->bindValue(":token", $token);
            $sql->bindValue(":expire", $expire_at);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }

        public function delete($token){
            $response = false;

            $sql = $this->connect->prepare("DELETE FROM ".$this->table." WHERE token = :token");
            $sql->bindParam(":token", $token);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }