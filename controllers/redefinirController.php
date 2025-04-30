<?php
    class redefinirController extends Controller{
        public function index(){

            if($this->validLogin()){
                header("Location: /");
                exit(); 
            }

            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login/resetPassword", $data);
        }

        public function updatePassword(){

            if($this->validLogin()){
                header("Location: /");
                exit(); 
            }

            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login/updatePassword", $data);
        }
    }
?>