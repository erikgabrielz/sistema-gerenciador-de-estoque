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

        public function newOrder () {
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $client = new Client();
            $data['clients'] = $client->getClient("", $_SESSION['id']);

            $product = new Product();
            $data['models'] = $product->getProduct();

            $data['title'] = "Nova O.S - ".APP_NAME;
            $this->loadView("orders/new_order", $data);
        }

        public function addOrder() {

        }
    }
?>