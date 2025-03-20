<?php
    require_once('Animal.php');
    class Bird extends Animal {
        private $wings;
        public function __construct(string $name, int $age, string $wings) {
            parent::__construct($name, $age);
            $this->wings = $wings;
        }

        public function getWings(): string {
            return $this->wings;
        }

        public function setWings(string $wings): void {
            $this->wings = $wings;
        }
    }
?>