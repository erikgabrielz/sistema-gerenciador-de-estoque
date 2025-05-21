<?php
    class cityController extends Controller{
        public function index($cidade, $state){
            $city = new City();

            $city->add($state, $cidade);
        }
    }
