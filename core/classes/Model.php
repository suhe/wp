<?php
class Model {
    public $model;
    public function __construct() {
        $this->model = new Database (
            $GLOBALS['config']['database']['host'],
            $GLOBALS['config']['database']['username'],
            $GLOBALS['config']['database']['password'],
            $GLOBALS['config']['database']['database']
        );
    }

    
}