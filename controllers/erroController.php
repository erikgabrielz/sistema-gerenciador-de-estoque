<?php
    class erroController extends Controller{
        public function index(){
            $dados['title'] = "Página de erro";
            $this->loadView("erro", $dados);
        }
    }
