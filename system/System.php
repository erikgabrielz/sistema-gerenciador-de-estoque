<?php
    class System{
        public function run(){
            $url = explode("index.php", $_SERVER['PHP_SELF']);
            $url = end($url);

            $params = array();
            
            if(isset($url) && !empty($url[0])){
                $url = explode("/", $url);
                array_shift($url);
                
                if(class_exists($url[0]."Controller")){
                    $currentController = $url[0]."Controller";
                    array_shift($url);
                    
                    if(isset($url) && !empty($url[0]) && method_exists($currentController, $url[0])){
                        $currentAction = $url[0];
                        array_shift($url);
                    }else{
                        $currentAction = "index";
                    }
                    
                    if(count($url) > 0){
                        $params = $url;
                    }
                }else{
                    $currentController = "erroController";
                    $currentAction = "index";
                }
            }else{
                $currentController = "homeController";
                $currentAction = "index";
            }
            
            $c = new $currentController();
            call_user_func_array(array($c, $currentAction), $params);
        }
    }
?>