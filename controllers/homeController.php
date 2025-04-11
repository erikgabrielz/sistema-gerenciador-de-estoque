<?php
    class homeController extends Controller{
        public function index(){
            $data['title'] = "Home - ".APP_NAME;
            $this->loadView("home", $data);
        }

        public function add(){
            
        }
    }
?>