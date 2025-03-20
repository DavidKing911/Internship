<?php
    require_once('Animal.php');
    class Fish extends Animal {
        private $tail;
        public function __construct(string $name, int $age, string $tail) {
            parent::__construct($name, $age);
            $this->tail = $tail;
        }

        public function getTail(): string {
            return $this->tail;
        }

        public function setTail($tail): void {
            $this->tail = $tail;
        }
    }
?>