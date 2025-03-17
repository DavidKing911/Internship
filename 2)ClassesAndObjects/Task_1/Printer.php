<?php
    require_once('Output.php');
    class Printer extends Output {
        public function __construct($str) {
            $this->setStr($str . " - Printer");
        }
    }
?>