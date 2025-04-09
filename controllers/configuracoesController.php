<?php
    class configuracoesController extends Controller{
        public function index(){
            $data['title'] = "Configurações - ".APP_NAME;
            $this->loadView("config", $data);
        }
    }
?>