<?php

    class Session extends Model{

        public function getSession($token){
            $response = false;

            $sql = $this->connect->prepare("SELECT sessions.id, user_id, ip, users.name, users.email, users.user, users.level, users.status FROM `sessions` INNER JOIN users ON user_id = users.id WHERE token = :token AND expire > NOW();");
            $sql->bindValue(":token", $token);

            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }

            return $response;
        }



        public function add($user_id, $ip, $token, $expire_at){
            $response = false;

            $sql = $this->connect->prepare("INSERT INTO `sessions` VALUES (default, :user_id, :ip, :token, default, :expire)");
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

            $sql = $this->connect->prepare("DELETE FROM `sessions` WHERE token = :token");
            $sql->bindParam(":token", $token);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }