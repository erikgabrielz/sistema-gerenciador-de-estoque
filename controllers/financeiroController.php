<?php
    class financeiroController extends Controller{
        public function index(){

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Financeiro - ".APP_NAME;
            $this->loadView("finance/finance", $data);
        }

    }
