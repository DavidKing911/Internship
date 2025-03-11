<?php
    class Output {
        private $str;
        
        public function getStr() {
            echo $this->str;
        }

        public function setStr($str) {
            $this->str = $str;
        }
    }

    class Printer extends Output {
        public function __construct($str) {
            $this->setStr($str . " - Printer");
        }
    }

    class ScreenOutput extends Output {
        public function __construct($str) {
            $this->setStr($str . " - Screen");
        }
    }

?>