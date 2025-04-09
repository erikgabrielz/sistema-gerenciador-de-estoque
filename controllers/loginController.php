<?php
    class loginController extends Controller{
        public function index(){
            $data['title'] = "Login - ".APP_NAME;
            $this->loadView("login", $data);
        }
    }
?>