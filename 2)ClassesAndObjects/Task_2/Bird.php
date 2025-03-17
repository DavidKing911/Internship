<?php
    require_once('Animal.php');
    class Bird extends Animal {
        private $wings;
        public function __construct($name, $age, $wings) {
            parent::__construct($name, $age);
            $this->wings = $wings;
        }

        public function getWings() {
            return $this->wings;
        }

        public function setWings($wings) {
            $this->wings = $wings;
        }
    }
?>