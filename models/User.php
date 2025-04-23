<?php

    class User extends Model{
        public function getUser($user){
            $response = false;

            $sql = $this->connect->prepare("SELECT * FROM users WHERE user = :user");
            $sql->bindParam(":user", $user);
            $sql->execute();

            if($sql->rowCount() > 0){
                $response = $sql->fetch();
            }else{
                $response = false;
            }

            return $response;
        }

        public function updateUser($id, $email, $password){
            $response = false;

            $sql = $this->connect->prepare("UPDATE users SET email = :email, `password` = :password, modified = NOW() WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $password);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }