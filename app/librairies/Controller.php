<?php
/*
 * Base controller
 * Loads the models and views
 * */

class Controller
{
    public function model($model)
    {
        //Require model file
        require_once '../app/models/' . $model . '.php';

        //Instantiate the model
        return new $model();
    }

    //Load view

    public function view($view, $data = [])
    {
        //Check view file
        if (file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            //View doesn't exist
            die('View doesn\'t exist');
        }

    }
}