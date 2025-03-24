<?php
    require_once('Animal.php');
    class Fish extends Animal {
        private $tail;
        private $scaleColor;
        private $scaleSize;
        public function __construct(string $name, int $age, string $tail, string $scaleColor, string $scaleSize) {
            parent::__construct($name, $age);
            $this->tail = $tail;
            $this->scaleColor = $scaleColor;
            $this->scaleSize = $scaleSize;
        }

        public function getTail(): string {
            return $this->tail;
        }

        public function getScaleColor(): string {
            return $this->scaleColor;
        }

        public function getScaleSize(): string {
            return $this->scaleSize;
        }
    }
?>