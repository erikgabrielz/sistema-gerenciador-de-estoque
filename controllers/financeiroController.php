<?php
    class financeiroController extends Controller{
        public function index(){
            $data['title'] = "Financeiro - ".APP_NAME;

            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $stock = new Stock();
            $sale = new Sale();

            $data['statistics']["stock"] = $stock->getStatistics();
            $data['statistics']['sales'] = $sale->getSale();

            $this->loadView("finance/finance", $data);
        }

    }
