<?php
    class servicosController extends Controller{
        public function index(){
            $data['title'] = "Ordens de Serviço - ".APP_NAME;
            $this->loadView("orders", $data);
        }
    }
?>