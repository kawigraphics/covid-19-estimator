<?php

/**
 * Base Controller
 * Loads the models and views
 */

class Controller{
    // Load View
    public function view($view, $data=[]){
        // Check for view file
        if(file_exists('../src/Views/' . $view . '.php')){
            require('../src/Views/' . $view . '.php');
        } else{
            die("View Does not exist");
        }
    }
}
