<?php
    class clientesController extends Controller{
        public function index(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Clientes - ".APP_NAME;
            $this->loadView("clients/clients", $data);
        }

        public function add(){
            if(!$this->validLogin()){
                header("Location: /login");
                exit(); 
            }

            $data['title'] = "Adicionar Cliente - ".APP_NAME;
            $this->loadView("clients/add", $data);
        }

        public function addCliente(){
            if(isset($_POST['name']) && !empty($_POST['name'])){
                if(isset($_POST['phone']) && !empty($_POST['phone'])){
                    if(isset($_POST['uf']) && !empty($_POST['uf'])){
                        if(isset($_POST['city']) && !empty($_POST['city'])){

                            if(!empty($_POST['email'])){
                                $email = addslashes($_POST['email']);
                            }

                            if(!empty($_POST['cep'])){
                                $cep = addslashes($_POST['cep']);
                            }
                            if(!empty($_POST['street'])){
                                $street = addslashes($_POST['street']);
                            }
                            if(!empty($_POST['number'])){
                                $street = addslashes($_POST['number']);
                            }
                            if(!empty($_POST['district'])){
                                $street = addslashes($_POST['district']);
                            }

                            $name = addslashes($_POST['name']);
                            $phone = addslashes($_POST['phone']);
                            $uf = addslashes($_POST['uf']);
                            $city = addslashes($_POST['city']);

                            //criar o banco de dados de clientes e a model, depois incluir aqui.
                        }
                    }
                }
            }
        }
    }
?>