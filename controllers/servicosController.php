<?php
    class servicosController extends Controller{
        public function index(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Ordens de Serviço - ".APP_NAME;
            $this->loadView("orders/orders", $data);
        }
    }
?>