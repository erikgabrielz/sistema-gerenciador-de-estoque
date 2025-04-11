<?php
    class homeController extends Controller{
        public function index(){
            $data['title'] = "Home - ".APP_NAME;         
            $this->loadView("home", $data);
        }

        public function getStock(){
            $return = "Nenhum produto encontrado!";
            $stock = new Stock();
            $stock = $stock->getStock();

            if(!empty($stock)){
                $return = json_encode($stock);
            }

            echo $return;
        }

        public function add(){
            $data['title'] = "Adicionar produto - ".APP_NAME;
            $this->loadView("addProduct", $data);
        }
    }
?>