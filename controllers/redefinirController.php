<?php
    class redefinirController extends Controller{
        public function index(){
            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login/resetPassword", $data);
        }

        public function updatePassword(){
            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login/updatePassword", $data);
        }
    }
?>