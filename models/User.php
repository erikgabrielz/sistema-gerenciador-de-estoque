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

        public function updateEmail($id, $email){
            $response = false;

            $sql = $this->connect->prepare("UPDATE users SET `email` = :email, modified = NOW() WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->bindParam(":email", $email);

            if($sql->execute()){
                $response = true;
                $_SESSION['email'] = $email;
            }

            return $response;
        }

        public function updatePassword($id, $password){
            $response = false;

            $sql = $this->connect->prepare("UPDATE users SET `password` = :password, modified = NOW() WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":password", $password);

            if($sql->execute()){
                $response = true;
            }

            return $response;
        }
    }