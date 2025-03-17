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
?>