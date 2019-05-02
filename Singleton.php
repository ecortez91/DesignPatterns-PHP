<?php
    final class SingleConfiguration 
    {
        private static $instance;
        public $version;

        private function __construct() {
        }

        private function __clone() {    
        }

        public static function getInstance() {
            if (!(self::$instance instanceof self)) {
                self::$instance = new self;
            }
            return self::$instance;
        }
    }

    $cfg = SingleConfiguration::getInstance();
    $cfg->version = 2.2;
    $cfg2 = SingleConfiguration::getInstance();
    $cfg2->version = 2.5;
    echo "The 1st version is: $cfg->version<br>The 2nd version is: $cfg2->version";
?>