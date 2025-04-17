<?php
    class databaseController extends Controller{
        public function index(){
            $data['title'] = "Gerenciar banco de dados - ".APP_NAME;         
            $this->loadView("database/management", $data);
        }
    }