<?php


/*
 * App Core Class
 * Creates URLS and loads core controller
 * URL FORMAT - /controller/method/params
 */

 class Core {
    protected $currentController = 'Homepage';
    protected $currentMethod = 'index';
    protected $params = [];

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function __construct(){
        // print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in the controllers for the First Value in the URL
         if(file_exists('../src/Controllers/' . ucwords($url[0]) . '.php')){

            // If Exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Require Current Controller
        require_once('../src/Controllers/' . $this->currentController .'.php');

        // Instantiate
        $this->currentController = new $this->currentController;

        // Check for the second part of url
        if(isset($url[1])){
            // Method basically if exists
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                // Unset 1 Index
                unset($url[1]);
            }

        }

        // Get Params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
}