<?php
    class ControllerNotFoundException extends Exception
    {
        public function __construct($message = "Controller not found")
        {
            parent::__construct($message, "0005");
        }
    }