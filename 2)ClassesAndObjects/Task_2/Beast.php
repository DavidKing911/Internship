<?php
    require_once('Animal.php');
    class Beast extends Animal {
        private $paws;
        public function __construct(string $name, int $age, string $paws) {
            parent::__construct($name, $age);
            $this->paws = $paws;
        }

        public function getPaws(): string {
            return $this->paws;
        }

        public function setPaws(string $paws): void {
            $this->paws = $paws;
        }
    }
?>