<?php
    class financeiroController extends Controller{
        public function index(){
            $data['title'] = "Financeiro - ".APP_NAME;
            $this->loadView("finance/finance", $data);
        }
    }
?>