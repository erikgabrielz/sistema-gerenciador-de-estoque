<?php
    class clientesController extends Controller{
        public function index(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Configurações - ".APP_NAME;
            $this->loadView("clients/clients", $data);
        }

        public function addCliente(){

        }
    }
?>