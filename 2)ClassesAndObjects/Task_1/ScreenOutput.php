<?php
    require_once('Output.php');
    class ScreenOutput extends Output {
        public function __construct($str) {
            $this->setStr($str . " - Screen");
        }
    }
?>