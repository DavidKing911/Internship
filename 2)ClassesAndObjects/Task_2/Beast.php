<?php
    require_once('Animal.php');
    class Beast extends Animal {
        private $paws;
        public function __construct($name, $age, $paws) {
            parent::__construct($name, $age);
            $this->paws = $paws;
        }

        public function getPaws() {
            return $this->paws;
        }

        public function setPaws($paws) {
            $this->paws = $paws;
        }
    }
?>